<?php
namespace hongkai\parquet\helper;

use hongkai\parquet\data\Schema;

use hongkai\parquet\format\ColumnChunk;

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
