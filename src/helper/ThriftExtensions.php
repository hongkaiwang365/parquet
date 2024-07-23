<?php
namespace hongkaiwang365\parquet\helper;

use hongkaiwang365\parquet\data\Schema;

use hongkaiwang365\parquet\format\ColumnChunk;

class ThriftExtensions
{
  /**
   * [GetPath description]
   * @param  ColumnChunk $columnChunk [description]
   * @return string                   [description]
   */
  public static function GetPath(ColumnChunk $columnChunk) : string
  {
     return implode(Schema::PathSeparator, $columnChunk->meta_data->path_in_schema);
  }
}
