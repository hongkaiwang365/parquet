<?php
namespace hongkai\parquet\data\concrete;

use Exception;

use hongkai\parquet\data\Field;
use hongkai\parquet\data\SchemaType;
use hongkai\parquet\data\StructField;
use hongkai\parquet\data\DataTypeFactory;
use hongkai\parquet\data\NonDataDataTypeHandler;

use hongkai\parquet\format\SchemaElement;
use hongkai\parquet\format\FieldRepetitionType;

class StructureDataTypeHandler extends NonDataDataTypeHandler
{
  /**
   * @inheritDoc
   */
  public function isMatch(
    \hongkai\parquet\format\SchemaElement $tse,
    ?\hongkai\parquet\ParquetOptions $formatOptions
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
    \hongkai\parquet\data\Field $field,
    \hongkai\parquet\format\SchemaElement $parent,
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
