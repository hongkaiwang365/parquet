<?php
namespace hongkaiwang365\parquet\data\concrete;

use hongkaiwang365\parquet\adapter\BinaryReader;
use hongkaiwang365\parquet\adapter\BinaryWriter;

use hongkaiwang365\parquet\data\DataType;
use hongkaiwang365\parquet\data\BasicDataTypeHandler;

use hongkaiwang365\parquet\format\Type;
use hongkaiwang365\parquet\format\ConvertedType;

class StringDataTypeHandler extends BasicDataTypeHandler
{
  /**
   */
  public function __construct()
  {
    $this->phpType = 'string';
    parent::__construct(DataType::String, Type::BYTE_ARRAY, ConvertedType::UTF8);
  }

  /**
   * @inheritDoc
   */
  public function isMatch(
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    ?\hongkaiwang365\parquet\ParquetOptions $formatOptions
  ): bool {

    return $tse->type && $tse->type === Type::BYTE_ARRAY &&
      (
        ($tse->converted_type !== null && $tse->converted_type === ConvertedType::UTF8) ||
        $formatOptions->TreatByteArrayAsString
      );
  }

  /**
   * @inheritDoc
   */
  protected function readSingle(
    \hongkaiwang365\parquet\adapter\BinaryReader $reader,
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    int $length
  ) {
    $this->readSingleInternal($reader, $tse, $length, true);
  }

  /**
   * [readSingleInternal description]
   * @param  \hongkaiwang365\parquet\adapter\BinaryReader $reader          [description]
   * @param  \hongkaiwang365\parquet\format\SchemaElement $tse             [description]
   * @param  int                                  $length          [description]
   * @param  bool                                 $hasLengthPrefix [description]
   * @return [type]                                            [description]
   */
  protected function readSingleInternal(
    \hongkaiwang365\parquet\adapter\BinaryReader $reader,
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    int $length,
    bool $hasLengthPrefix
  ) {
    if ($length === -1) {
      if($hasLengthPrefix) {
        $length = $reader->readInt32();
      } else {
        $length = $reader->getEofPosition();
      }
    }

    // NOTE: possible UTF8 handling needed.
    return $reader->readString($length);
  }

  /**
   * @inheritDoc
   */
  public function read(
    \hongkaiwang365\parquet\adapter\BinaryReader $reader,
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    array &$dest,
    int $offset
  ): int {

    $remLength = (int)($reader->getEofPosition() - $reader->getPosition());

    if ($remLength === 0) {
      return 0;
    }

    // reading string one by one is extremely slow, read all data
    $allBytes = $reader->readBytes($remLength);

    $destIdx = $offset;
    $spanIdx = 0;
    $destCount = \count($dest);

    while ($spanIdx < $remLength && $destIdx < $destCount)
    {
      // see https://www.php.net/manual/de/function.unpack.php
      // unpack("l", $value)[1]  is for int32
      $length = \unpack('l', \substr($allBytes, $spanIdx, 4))[1];
      $s = \substr($allBytes, $spanIdx + 4, $length);

      $dest[$destIdx++] = $s;
      $spanIdx = $spanIdx + 4 + $length;
    }

    return $destIdx - $offset;
  }

  /**
   * @inheritDoc
   */
  public function unpackDefinitions(
    array $src,
    array $definitionLevels,
    int $maxDefinitionLevel,
    array &$hasValueFlags
  ): array {
    return $this->unpackGenericDefinitions($src, $definitionLevels, $maxDefinitionLevel, $hasValueFlags);
  }

  /**
  * @inheritDoc
   */
  protected function WriteOne(\hongkaiwang365\parquet\adapter\BinaryWriter $writer, $value): void
  {
    $this->writeOneInternal($writer, $value, true);
  }

  /**
   * Internal write function to allow writing without length prefix
   */
  /**
   * [WriteOneInternal description]
   * @param \hongkaiwang365\parquet\adapter\BinaryWriter $writer [description]
   * @param string                               $value  [description]
   * @param bool                                 $includeLengthPrefix
   */
  protected function WriteOneInternal(\hongkaiwang365\parquet\adapter\BinaryWriter $writer, $value, bool $includeLengthPrefix): void
  {
    $valueLength = null;
    if ($value === null || ($valueLength = \strlen($value)) === 0)
    {
      if($includeLengthPrefix) {
        $writer->writeInt32(0);
      }
    }
    else
    {
      // transform to byte array first, as we need the length of the byte buffer, not string length
      // byte[] data = E.GetBytes(value);
      // NOTE: for php, we already have binary-safe functions, so we simply write a string.
      if($includeLengthPrefix) {
        $valueLength = $valueLength ?? \strlen($value);
        $writer->writeInt32($valueLength);
      }
      $writer->writeString($value);
    }
  }

  /**
   * @inheritDoc
   */
  public function compare($x, $y): int
  {
    return strcmp($x, $y);
  }

  /**
   * @inheritDoc
   */
  public function plainEncode(\hongkaiwang365\parquet\format\SchemaElement $tse, $x)
  {
    if($x === null) return null;

    $ms = fopen('php://memory', 'r+');
    $bs = BinaryWriter::createInstance($ms);
    $this->WriteOneInternal($bs, $x, false);
    return $bs->toString();
  }

  /**
   * @inheritDoc
   */
  public function plainDecode(
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    $encoded
  ) {
    if ($encoded === null) return null;

    $ms = fopen('php://memory', 'r+');
    fwrite($ms, $encoded);
    $br = BinaryReader::createInstance($ms);
    $element = $this->readSingleInternal($br, $tse, -1, false);
    return $element;
  }

}
