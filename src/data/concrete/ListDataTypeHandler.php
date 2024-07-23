<?php
namespace hongkaiwang365\parquet\data\concrete;

use Exception;

use hongkaiwang365\parquet\data\Field;
use hongkaiwang365\parquet\data\Schema;
use hongkaiwang365\parquet\data\ListField;
use hongkaiwang365\parquet\data\SchemaType;
use hongkaiwang365\parquet\data\DataTypeFactory;
use hongkaiwang365\parquet\data\NonDataDataTypeHandler;

use hongkaiwang365\parquet\format\ConvertedType;
use hongkaiwang365\parquet\format\SchemaElement;
use hongkaiwang365\parquet\format\FieldRepetitionType;

class ListDataTypeHandler extends NonDataDataTypeHandler
{
  /**
   * @inheritDoc
   */
  public function isMatch(
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    ?\hongkaiwang365\parquet\ParquetOptions $formatOptions
  ): bool {
    return (isset($tse->converted_type) && $tse->converted_type === ConvertedType::LIST);
  }

  /**
   * @inheritDoc
   */
  public function createSchemaElement(
    array $schema,
    int &$index,
    int &$ownedChildCount
  ) : Field {
    $tseList = $schema[$index];
    $listField = ListField::createWithNoItem($tseList->name);
    // as we are skipping elements set path hint
    // $listField->path = $"{tseList.Name}{Schema.PathSeparator}{schema[index + 1].Name}"; // TODO
    // $listField->path = "{$tseList->name}{Schema::PathSeparator}{$schema[$index + 1]->name}";
    $listField->path = implode(Schema::PathSeparator, [ $tseList->name, $schema[$index + 1]->name]);
    $index += 2;          //skip this element and child container
    $ownedChildCount = 1; //we should get this element assigned back
    return $listField;
  }

  /**
   * @inheritDoc
   */
  public function getSchemaType(): int
  {
    return SchemaType::List;
  }

  /**
   * @inheritDoc
   */
  public function createThrift(
    \hongkaiwang365\parquet\data\Field $field,
    \hongkaiwang365\parquet\format\SchemaElement $parent,
    array &$container
  ): void {
    $parent->num_children += 1;

    //add list container
    $root = new SchemaElement([
      'name'            => $field->name,
      'converted_type'  => ConvertedType::LIST,
      'repetition_type' => FieldRepetitionType::OPTIONAL,
      'num_children'    => 1,
    ]);

    $container[] = $root;

    //add field container
    $list = new SchemaElement([
      'name'            => "list",
      'repetition_type' => FieldRepetitionType::REPEATED
    ]);

    $container[] = $list;

    //add the list item as well
    if($field instanceof ListField) {
      $fieldHandler = DataTypeFactory::matchField($field->item);
      $fieldHandler->createThrift($field->item, $list, $container);
    } else {
      throw new Exception('Invalid field');
      // TODO: throw exception?
    }
  }

}
