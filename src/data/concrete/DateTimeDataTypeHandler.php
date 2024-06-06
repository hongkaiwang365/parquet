<?php
namespace hongkai\parquet\data\concrete;

use DateTime;
use DateTimeImmutable;

use hongkai\parquet\adapter\BinaryReader;

use hongkai\parquet\data\DataType;
use hongkai\parquet\data\BasicPrimitiveDataTypeHandler;

use hongkai\parquet\format\Type;
use hongkai\parquet\format\ConvertedType;

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
    \hongkai\parquet\format\SchemaElement $tse,
    ?\hongkai\parquet\ParquetOptions $formatOptions
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
    \hongkai\parquet\format\SchemaElement $tse,
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
    \hongkai\parquet\format\SchemaElement $tse,
    int $length
  ) {
    throw new \LogicException('this stub should never be called');
  }
}
