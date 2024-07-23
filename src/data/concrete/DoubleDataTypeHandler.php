<?php
namespace hongkaiwang365\parquet\data\concrete;

use hongkaiwang365\parquet\data\DataType;
use hongkaiwang365\parquet\data\BasicPrimitiveDataTypeHandler;

use hongkaiwang365\parquet\format\Type;
use hongkaiwang365\parquet\format\ConvertedType;

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
    \hongkaiwang365\parquet\adapter\BinaryReader $reader,
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    int $length
  ) : float {
    return $reader->readDouble();
  }

  /**
   * @inheritDoc
   */
  protected function WriteOne(\hongkaiwang365\parquet\adapter\BinaryWriter $writer, $value): void
  {
    $writer->writeDouble($value);
  }
}
