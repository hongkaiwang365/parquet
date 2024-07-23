<?php
namespace hongkaiwang365\parquet\data\concrete;

use hongkaiwang365\parquet\data\DataType;
use hongkaiwang365\parquet\data\BasicDataTypeHandler;
use hongkaiwang365\parquet\data\BasicPrimitiveDataTypeHandler;

use hongkaiwang365\parquet\format\Type;
use hongkaiwang365\parquet\format\ConvertedType;

class Int64DataTypeHandler extends BasicPrimitiveDataTypeHandler
{
  /**
   */
  public function __construct()
  {
    $this->phpType = 'integer';
    parent::__construct(DataType::Int64, Type::INT64);
  }

  /**
   * @inheritDoc
   */
  protected function readSingle(
    \hongkaiwang365\parquet\adapter\BinaryReader $reader,
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    int $length
  ) {
    return $reader->readInt64();
  }

  /**
   * @inheritDoc
   */
  protected function WriteOne(\hongkaiwang365\parquet\adapter\BinaryWriter $writer, $value): void
  {
    $writer->writeInt64($value);
  }
}
