<?php
namespace hongkaiwang365\parquet\data\concrete;

use hongkaiwang365\parquet\data\DataType;
use hongkaiwang365\parquet\data\BasicPrimitiveDataTypeHandler;

use hongkaiwang365\parquet\format\Type;
use hongkaiwang365\parquet\format\ConvertedType;

class ByteDataTypeHandler extends BasicPrimitiveDataTypeHandler
{
  /**
   */
  public function __construct()
  {
    $this->phpType = 'string'; // ?
    parent::__construct(DataType::Byte, Type::INT32, ConvertedType::UINT_8);
  }

  /**
   * @inheritDoc
   */
  protected function readSingle(
    \hongkaiwang365\parquet\adapter\BinaryReader $reader,
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    int $length
  ) {
    // We're always reading INT32, see Thrift Type
    // TODO: Check whether we'd need some unpacking magic
    return $reader->readInt32();
  }

  /**
   * @inheritDoc
   */
  protected function WriteOne(\hongkaiwang365\parquet\adapter\BinaryWriter $writer, $value): void
  {
    // We're always writing INT32, see Thrift Type
    $writer->writeInt32($value);
  }

}
