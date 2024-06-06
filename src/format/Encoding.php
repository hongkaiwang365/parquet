<?php
namespace hongkai\parquet\format;

/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

/**
 * Encodings supported by Parquet.  Not all encodings are valid for all types.  These
 * enums are also used to specify the encoding of definition and repetition levels.
 * See the accompanying doc for the details of the more complicated encodings.
 */
final class Encoding
{
    /**
     * Default encoding.
     * BOOLEAN - 1 bit per value. 0 is false; 1 is true.
     * INT32 - 4 bytes per value.  Stored as little-endian.
     * INT64 - 8 bytes per value.  Stored as little-endian.
     * FLOAT - 4 bytes per value.  IEEE. Stored as little-endian.
     * DOUBLE - 8 bytes per value.  IEEE. Stored as little-endian.
     * BYTE_ARRAY - 4 byte length stored as little endian, followed by bytes.
     * FIXED_LEN_BYTE_ARRAY - Just the bytes.
     */
    const PLAIN = 0;

    /**
     * Deprecated: Dictionary encoding. The values in the dictionary are encoded in the
     * plain type.
     * in a data page use RLE_DICTIONARY instead.
     * in a Dictionary page use PLAIN instead
     */
    const PLAIN_DICTIONARY = 2;

    /**
     * Group packed run length encoding. Usable for definition/repetition levels
     * encoding and Booleans (on one bit: 0 is false; 1 is true.)
     */
    const RLE = 3;

    /**
     * Bit packed encoding.  This can only be used if the data has a known max
     * width.  Usable for definition/repetition levels encoding.
     */
    const BIT_PACKED = 4;

    /**
     * Delta encoding for integers. This can be used for int columns and works best
     * on sorted data
     */
    const DELTA_BINARY_PACKED = 5;

    /**
     * Encoding for byte arrays to separate the length values and the data. The lengths
     * are encoded using DELTA_BINARY_PACKED
     */
    const DELTA_LENGTH_BYTE_ARRAY = 6;

    /**
     * Incremental-encoded byte array. Prefix lengths are encoded using DELTA_BINARY_PACKED.
     * Suffixes are stored as delta length byte arrays.
     */
    const DELTA_BYTE_ARRAY = 7;

    /**
     * Dictionary encoding: the ids are encoded using the RLE encoding
     */
    const RLE_DICTIONARY = 8;

    /**
     * Encoding for floating-point data.
     * K byte-streams are created where K is the size in bytes of the data type.
     * The individual bytes of an FP value are scattered to the corresponding stream and
     * the streams are concatenated.
     * This itself does not reduce the size of the data but can lead to better compression
     * afterwards.
     */
    const BYTE_STREAM_SPLIT = 9;

    static public $__names = array(
        0 => 'PLAIN',
        2 => 'PLAIN_DICTIONARY',
        3 => 'RLE',
        4 => 'BIT_PACKED',
        5 => 'DELTA_BINARY_PACKED',
        6 => 'DELTA_LENGTH_BYTE_ARRAY',
        7 => 'DELTA_BYTE_ARRAY',
        8 => 'RLE_DICTIONARY',
        9 => 'BYTE_STREAM_SPLIT',
    );
}

