<?php
namespace hongkaiwang365\parquet\format;

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

class TimeUnit
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'MILLIS',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkaiwang365\parquet\format\MilliSeconds',
        ),
        2 => array(
            'var' => 'MICROS',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkaiwang365\parquet\format\MicroSeconds',
        ),
        3 => array(
            'var' => 'NANOS',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\hongkaiwang365\parquet\format\NanoSeconds',
        ),
    );

    /**
     * @var \hongkaiwang365\parquet\format\MilliSeconds
     */
    public $MILLIS = null;
    /**
     * @var \hongkaiwang365\parquet\format\MicroSeconds
     */
    public $MICROS = null;
    /**
     * @var \hongkaiwang365\parquet\format\NanoSeconds
     */
    public $NANOS = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['MILLIS'])) {
                $this->MILLIS = $vals['MILLIS'];
            }
            if (isset($vals['MICROS'])) {
                $this->MICROS = $vals['MICROS'];
            }
            if (isset($vals['NANOS'])) {
                $this->NANOS = $vals['NANOS'];
            }
        }
    }

    public function getName()
    {
        return 'TimeUnit';
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
                        $this->MILLIS = new \hongkaiwang365\parquet\format\MilliSeconds();
                        $xfer += $this->MILLIS->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->MICROS = new \hongkaiwang365\parquet\format\MicroSeconds();
                        $xfer += $this->MICROS->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRUCT) {
                        $this->NANOS = new \hongkaiwang365\parquet\format\NanoSeconds();
                        $xfer += $this->NANOS->read($input);
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
        $xfer += $output->writeStructBegin('TimeUnit');
        if ($this->MILLIS !== null) {
            if (!is_object($this->MILLIS)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('MILLIS', TType::STRUCT, 1);
            $xfer += $this->MILLIS->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->MICROS !== null) {
            if (!is_object($this->MICROS)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('MICROS', TType::STRUCT, 2);
            $xfer += $this->MICROS->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->NANOS !== null) {
            if (!is_object($this->NANOS)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('NANOS', TType::STRUCT, 3);
            $xfer += $this->NANOS->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
