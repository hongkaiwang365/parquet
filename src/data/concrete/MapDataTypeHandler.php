<?php
namespace hongkai\parquet\data\concrete;

use Exception;

use hongkai\parquet\data\Field;
use hongkai\parquet\data\Schema;
use hongkai\parquet\data\MapField;
use hongkai\parquet\data\SchemaType;
use hongkai\parquet\data\NonDataDataTypeHandler;

use hongkai\parquet\format\ConvertedType;

class MapDataTypeHandler extends NonDataDataTypeHandler
{
  /**
   * @inheritDoc
   */
  public function isMatch(
    \hongkai\parquet\format\SchemaElement $tse,
    ?\hongkai\parquet\ParquetOptions $formatOptions
  ): bool {
    return isset($tse->converted_type) && ($tse->converted_type === ConvertedType::MAP || $tse->converted_type === ConvertedType::MAP_KEY_VALUE);
  }

  /**
   * @inheritDoc
   */
  public function createSchemaElement(
    array $schema,
    int &$index,
    int &$ownedChildCount
  ): Field {
    $tseRoot = $schema[$index];

    //next element is a container
    $tseContainer = $schema[++$index];

    if ($tseContainer->num_children != 2)
    {
      // throw new IndexOutOfRangeException("dictionary container must have exactly 2 children but {$tseContainer->num_children} found");
      throw new Exception("dictionary container must have exactly 2 children but {$tseContainer->num_children} found");
    }

    //followed by a key and a value, but we declared them as owned

    $map = new MapField($tseRoot->name);
    $map->path = $tseRoot->name . Schema::PathSeparator . $tseContainer->name;

    $index += 1;
    $ownedChildCount = 2;
    return $map;
  }

  /**
   * @inheritDoc
   */
  public function getSchemaType(): int
  {
    return SchemaType::Map;
  }

  /**
   * @inheritDoc
   */
  public function createThrift(
    \hongkai\parquet\data\Field $field,
    \hongkai\parquet\format\SchemaElement $parent,
    array &$container
  ): void {
    throw new \LogicException('Not implemented'); // TODO
  }
}
