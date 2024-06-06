<?php
namespace hongkai\parquet\data\concrete;

use hongkai\parquet\data\DataType;
use hongkai\parquet\data\BasicPrimitiveDataTypeHandler;

use hongkai\parquet\format\Type;
use hongkai\parquet\format\ConvertedType;

class DoubleDataTypeHandler extends BasicPrimitiveDataTypeHandler
{
  /**
   */
  public function __construct()
  {
    $this->phpType = 'double';
    parent::__construct(DataType::Double, Type::DOUBLE);
  }

  /**
   * @inheritDoc
   */
  protected function readSingle(
    \hongkai\parquet\adapter\BinaryReader $reader,
    \hongkai\parquet\format\SchemaElement $tse,
    int $length
  ) : float {
    return $reader->readDouble();
  }

  /**
   * @inheritDoc
   */
  protected function WriteOne(\hongkai\parquet\adapter\BinaryWriter $writer, $value): void
  {
    $writer->writeDouble($value);
  }
}
