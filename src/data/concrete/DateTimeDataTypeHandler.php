<?php
namespace hongkaiwang365\parquet\data\concrete;

use DateTime;
use DateTimeImmutable;

use hongkaiwang365\parquet\adapter\BinaryReader;

use hongkaiwang365\parquet\data\DataType;
use hongkaiwang365\parquet\data\BasicPrimitiveDataTypeHandler;

use hongkaiwang365\parquet\format\Type;
use hongkaiwang365\parquet\format\ConvertedType;

/**
 * [DateTimeOffsetDataTypeHandler description]
 *
 * NOTE: this is disabled in favor of DataTimeOffsetDataTypeHandler
 */
class DateTimeDataTypeHandler extends BasicPrimitiveDataTypeHandler
{
  /**
   */
  public function __construct()
  {
    $this->phpType = 'object';
    $this->phpClass = DateTimeImmutable::class;
    parent::__construct(DataType::DateTimeOffset, Type::BYTE_ARRAY);
  }

  /**
   * @inheritDoc
   */
  public function isMatch(
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    ?\hongkaiwang365\parquet\ParquetOptions $formatOptions
  ): bool {
    return
      ($tse->type === Type::INT96 && $formatOptions->TreatBigIntegersAsDates) || // Impala
      ($tse->type === Type::INT64 && isset($tse->converted_type) && $tse->converted_type === ConvertedType::TIMESTAMP_MILLIS) ||
      ($tse->type === Type::INT32 && isset($tse->converted_type) && $tse->converted_type === ConvertedType::DATE);
  }

  /**
   * @inheritDoc
   */
  public function read(
    BinaryReader $reader,
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    array &$dest,
    int $offset
  ): int {
    echo("DateTimeData Read");
    return parent::read($reader, $tse, $dest, $offset);
  }


  /**
   * @inheritDoc
   */
  protected function readSingle(
    BinaryReader $reader,
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    int $length
  ) {
    throw new \LogicException('this stub should never be called');
  }
}
