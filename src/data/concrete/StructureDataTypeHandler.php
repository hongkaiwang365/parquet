<?php
namespace hongkaiwang365\parquet\data\concrete;

use Exception;

use hongkaiwang365\parquet\data\Field;
use hongkaiwang365\parquet\data\SchemaType;
use hongkaiwang365\parquet\data\StructField;
use hongkaiwang365\parquet\data\DataTypeFactory;
use hongkaiwang365\parquet\data\NonDataDataTypeHandler;

use hongkaiwang365\parquet\format\SchemaElement;
use hongkaiwang365\parquet\format\FieldRepetitionType;

class StructureDataTypeHandler extends NonDataDataTypeHandler
{
  /**
   * @inheritDoc
   */
  public function isMatch(
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    ?\hongkaiwang365\parquet\ParquetOptions $formatOptions
  ): bool {
    return $tse->num_children > 0;
  }

  /**
   * @inheritDoc
   */
  public function createSchemaElement(
    array $schema,
    int &$index,
    int &$ownedChildCount
  ): Field {
    $container = $schema[$index++];

    $ownedChildCount = $container->num_children; //make then owned to receive in .Assign()
    $f = StructField::CreateWithNoElements($container->name);
    return $f;
  }

  /**
   * @inheritDoc
   */
  public function getSchemaType(): int
  {
    return SchemaType::Struct;
  }

  /**
   * @inheritDoc
   */
  public function createThrift(
    \hongkaiwang365\parquet\data\Field $field,
    \hongkaiwang365\parquet\format\SchemaElement $parent,
    array &$container
  ): void {
    $tseStruct = new SchemaElement([
      'name' => $field->name,
      'repetition_type' => FieldRepetitionType::OPTIONAL,
    ]);

    $container[] = $tseStruct;
    $parent->num_children += 1;

    if($field instanceof StructField) {
      foreach($field->getFields() as $cf) {
        $handler = DataTypeFactory::matchField($cf);
        $handler->createThrift($cf, $tseStruct, $container);
      }
    } else {
      throw new Exception('invalid field');
    }
  }
}
