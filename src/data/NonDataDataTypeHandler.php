<?php
namespace hongkaiwang365\parquet\data;

abstract class NonDataDataTypeHandler implements DataTypeHandlerInterface
{
  /**
   * @inheritDoc
   */
  public function getDataType(): int
  {
    return DataType::Unspecified;
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
    throw new \LogicException('Not implemented'); // TODO
  }

  /**
   * @inheritDoc
   */
  public function readObject(
    \hongkaiwang365\parquet\adapter\BinaryReader $reader,
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    int $length
  ) {
    throw new \LogicException('Not implemented'); // TODO
  }

  /**
   * @inheritDoc
   */
  public function mergeDictionary(
    array $dictionary,
    array $indexes,
    array &$data,
    int $offset,
    int $length
  ): array {
    throw new \LogicException('Not implemented'); // TODO
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
    throw new \LogicException('Not implemented'); // TODO
  }

  /**
   * @inheritDoc
   */
  public function packDefinitions(
    array $data,
    int $maxDefinitionLevel,
    array &$definitions,
    int &$definitionsLength,
    int &$nullCount
  ): array {
    throw new \LogicException('Not implemented'); // TODO
  }

  /**
   * @inheritDoc
   */
  public function write(
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    \hongkaiwang365\parquet\adapter\BinaryWriter $writer,
    array $values,
    \hongkaiwang365\parquet\data\DataColumnStatistics $statistics = null
  ): void {
    throw new \LogicException('Not implemented'); // TODO
  }

  /**
   * @inheritDoc
   */
  public function plainEncode(\hongkaiwang365\parquet\format\SchemaElement $tse, $x)
  {
    throw new \LogicException('Not implemented'); // TODO
  }

  /**
   * @inheritDoc
   */
  public function plainDecode(
    \hongkaiwang365\parquet\format\SchemaElement $tse,
    $encoded
  ) {
    throw new \LogicException('Not implemented'); // TODO
  }
}
