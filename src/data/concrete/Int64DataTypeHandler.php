<?php
namespace hongkai\parquet\data\concrete;

use hongkai\parquet\data\DataType;
use hongkai\parquet\data\BasicDataTypeHandler;
use hongkai\parquet\data\BasicPrimitiveDataTypeHandler;

use hongkai\parquet\format\Type;
use hongkai\parquet\format\ConvertedType;

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
    \hongkai\parquet\adapter\BinaryReader $reader,
    \hongkai\parquet\format\SchemaElement $tse,
    int $length
  ) {
    return $reader->readInt64();
  }

  /**
   * @inheritDoc
   */
  protected function WriteOne(\hongkai\parquet\adapter\BinaryWriter $writer, $value): void
  {
    $writer->writeInt64($value);
  }
}
