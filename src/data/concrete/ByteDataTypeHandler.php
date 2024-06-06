<?php
namespace hongkai\parquet\data\concrete;

use hongkai\parquet\data\DataType;
use hongkai\parquet\data\BasicPrimitiveDataTypeHandler;

use hongkai\parquet\format\Type;
use hongkai\parquet\format\ConvertedType;

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
    \hongkai\parquet\adapter\BinaryReader $reader,
    \hongkai\parquet\format\SchemaElement $tse,
    int $length
  ) {
    // We're always reading INT32, see Thrift Type
    // TODO: Check whether we'd need some unpacking magic
    return $reader->readInt32();
  }

  /**
   * @inheritDoc
   */
  protected function WriteOne(\hongkai\parquet\adapter\BinaryWriter $writer, $value): void
  {
    // We're always writing INT32, see Thrift Type
    $writer->writeInt32($value);
  }

}
