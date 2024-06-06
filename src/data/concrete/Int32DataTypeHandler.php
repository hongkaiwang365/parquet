<?php
namespace hongkai\parquet\data\concrete;

use hongkai\parquet\data\DataType;
use hongkai\parquet\data\BasicDataTypeHandler;
use hongkai\parquet\data\BasicPrimitiveDataTypeHandler;

use hongkai\parquet\format\Type;
use hongkai\parquet\format\ConvertedType;

class Int32DataTypeHandler extends BasicPrimitiveDataTypeHandler
{
  /**
   */
  public function __construct()
  {
    $this->phpType = 'integer';
    parent::__construct(DataType::Int32, Type::INT32);
  }

  /**
   * @inheritDoc
   */
  protected function readSingle(
    \hongkai\parquet\adapter\BinaryReader $reader,
    \hongkai\parquet\format\SchemaElement $tse,
    int $length
  ) {
    return $reader->readInt32();
  }

  /**
   * @inheritDoc
   */
  protected function WriteOne(\hongkai\parquet\adapter\BinaryWriter $writer, $value): void
  {
    $writer->writeInt32($value);
  }
}
