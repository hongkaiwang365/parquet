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
 * LogicalType annotations to replace ConvertedType.
 * 
 * To maintain compatibility, implementations using LogicalType for a
 * SchemaElement must also set the corresponding ConvertedType from the
 * following table.
 */
class LogicalType
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'STRING',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\StringType',
        ),
        2 => array(
            'var' => 'MAP',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\MapType',
        ),
        3 => array(
            'var' => 'LIST',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\ListType',
        ),
        4 => array(
            'var' => 'ENUM',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\EnumType',
        ),
        5 => array(
            'var' => 'DECIMAL',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\DecimalType',
        ),
        6 => array(
            'var' => 'DATE',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\DateType',
        ),
        7 => array(
            'var' => 'TIME',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\TimeType',
        ),
        8 => array(
            'var' => 'TIMESTAMP',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\TimestampType',
        ),
        10 => array(
            'var' => 'INTEGER',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\IntType',
        ),
        11 => array(
            'var' => 'UNKNOWN',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\NullType',
        ),
        12 => array(
            'var' => 'JSON',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\JsonType',
        ),
        13 => array(
            'var' => 'BSON',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\BsonType',
        ),
        14 => array(
            'var' => 'UUID',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkai\parquet\format\UUIDType',
        ),
    );

    /**
     * @var \hongkai\parquet\format\StringType
     */
    public $STRING = null;
    /**
     * @var \hongkai\parquet\format\MapType
     */
    public $MAP = null;
    /**
     * @var \hongkai\parquet\format\ListType
     */
    public $LIST = null;
    /**
     * @var \hongkai\parquet\format\EnumType
     */
    public $ENUM = null;
    /**
     * @var \hongkai\parquet\format\DecimalType
     */
    public $DECIMAL = null;
    /**
     * @var \hongkai\parquet\format\DateType
     */
    public $DATE = null;
    /**
     * @var \hongkai\parquet\format\TimeType
     */
    public $TIME = null;
    /**
     * @var \hongkai\parquet\format\TimestampType
     */
    public $TIMESTAMP = null;
    /**
     * @var \hongkai\parquet\format\IntType
     */
    public $INTEGER = null;
    /**
     * @var \hongkai\parquet\format\NullType
     */
    public $UNKNOWN = null;
    /**
     * @var \hongkai\parquet\format\JsonType
     */
    public $JSON = null;
    /**
     * @var \hongkai\parquet\format\BsonType
     */
    public $BSON = null;
    /**
     * @var \hongkai\parquet\format\UUIDType
     */
    public $UUID = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['STRING'])) {
                $this->STRING = $vals['STRING'];
            }
            if (isset($vals['MAP'])) {
                $this->MAP = $vals['MAP'];
            }
            if (isset($vals['LIST'])) {
                $this->LIST = $vals['LIST'];
            }
            if (isset($vals['ENUM'])) {
                $this->ENUM = $vals['ENUM'];
            }
            if (isset($vals['DECIMAL'])) {
                $this->DECIMAL = $vals['DECIMAL'];
            }
            if (isset($vals['DATE'])) {
                $this->DATE = $vals['DATE'];
            }
            if (isset($vals['TIME'])) {
                $this->TIME = $vals['TIME'];
            }
            if (isset($vals['TIMESTAMP'])) {
                $this->TIMESTAMP = $vals['TIMESTAMP'];
            }
            if (isset($vals['INTEGER'])) {
                $this->INTEGER = $vals['INTEGER'];
            }
            if (isset($vals['UNKNOWN'])) {
                $this->UNKNOWN = $vals['UNKNOWN'];
            }
            if (isset($vals['JSON'])) {
                $this->JSON = $vals['JSON'];
            }
            if (isset($vals['BSON'])) {
                $this->BSON = $vals['BSON'];
            }
            if (isset($vals['UUID'])) {
                $this->UUID = $vals['UUID'];
            }
        }
    }

    public function getName()
    {
        return 'LogicalType';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->STRING = new \hongkai\parquet\format\StringType();
                        $xfer += $this->STRING->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->MAP = new \hongkai\parquet\format\MapType();
                        $xfer += $this->MAP->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRUCT) {
                        $this->LIST = new \hongkai\parquet\format\ListType();
                        $xfer += $this->LIST->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRUCT) {
                        $this->ENUM = new \hongkai\parquet\format\EnumType();
                        $xfer += $this->ENUM->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRUCT) {
                        $this->DECIMAL = new \hongkai\parquet\format\DecimalType();
                        $xfer += $this->DECIMAL->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::STRUCT) {
                        $this->DATE = new \hongkai\parquet\format\DateType();
                        $xfer += $this->DATE->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::STRUCT) {
                        $this->TIME = new \hongkai\parquet\format\TimeType();
                        $xfer += $this->TIME->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::STRUCT) {
                        $this->TIMESTAMP = new \hongkai\parquet\format\TimestampType();
                        $xfer += $this->TIMESTAMP->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 10:
                    if ($ftype == TType::STRUCT) {
                        $this->INTEGER = new \hongkai\parquet\format\IntType();
                        $xfer += $this->INTEGER->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::STRUCT) {
                        $this->UNKNOWN = new \hongkai\parquet\format\NullType();
                        $xfer += $this->UNKNOWN->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 12:
                    if ($ftype == TType::STRUCT) {
                        $this->JSON = new \hongkai\parquet\format\JsonType();
                        $xfer += $this->JSON->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 13:
                    if ($ftype == TType::STRUCT) {
                        $this->BSON = new \hongkai\parquet\format\BsonType();
                        $xfer += $this->BSON->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 14:
                    if ($ftype == TType::STRUCT) {
                        $this->UUID = new \hongkai\parquet\format\UUIDType();
                        $xfer += $this->UUID->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('LogicalType');
        if ($this->STRING !== null) {
            if (!is_object($this->STRING)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('STRING', TType::STRUCT, 1);
            $xfer += $this->STRING->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->MAP !== null) {
            if (!is_object($this->MAP)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('MAP', TType::STRUCT, 2);
            $xfer += $this->MAP->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->LIST !== null) {
            if (!is_object($this->LIST)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('LIST', TType::STRUCT, 3);
            $xfer += $this->LIST->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->ENUM !== null) {
            if (!is_object($this->ENUM)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('ENUM', TType::STRUCT, 4);
            $xfer += $this->ENUM->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->DECIMAL !== null) {
            if (!is_object($this->DECIMAL)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('DECIMAL', TType::STRUCT, 5);
            $xfer += $this->DECIMAL->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->DATE !== null) {
            if (!is_object($this->DATE)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('DATE', TType::STRUCT, 6);
            $xfer += $this->DATE->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->TIME !== null) {
            if (!is_object($this->TIME)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('TIME', TType::STRUCT, 7);
            $xfer += $this->TIME->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->TIMESTAMP !== null) {
            if (!is_object($this->TIMESTAMP)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('TIMESTAMP', TType::STRUCT, 8);
            $xfer += $this->TIMESTAMP->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->INTEGER !== null) {
            if (!is_object($this->INTEGER)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('INTEGER', TType::STRUCT, 10);
            $xfer += $this->INTEGER->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->UNKNOWN !== null) {
            if (!is_object($this->UNKNOWN)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('UNKNOWN', TType::STRUCT, 11);
            $xfer += $this->UNKNOWN->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->JSON !== null) {
            if (!is_object($this->JSON)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('JSON', TType::STRUCT, 12);
            $xfer += $this->JSON->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->BSON !== null) {
            if (!is_object($this->BSON)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('BSON', TType::STRUCT, 13);
            $xfer += $this->BSON->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->UUID !== null) {
            if (!is_object($this->UUID)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('UUID', TType::STRUCT, 14);
            $xfer += $this->UUID->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}