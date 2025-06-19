<?php

namespace App\Classes;

use Exception;

class BinaryReader
{
    private string $buffer;
    private int $position = 0;
    private bool $littleEndian;

    public function __construct(string $buffer, bool $littleEndian = true)
    {
        $this->buffer = $buffer;
        $this->littleEndian = $littleEndian;
    }

    public function readByte(): int
    {
        return $this->readUnpack('C', 1);
    }

    public function readInt16(): int
    {
        $value = $this->readUnpack($this->littleEndian ? 'v' : 'n', 2);
        if ($value >= 0x8000) {
            $value -= 0x10000;
        }
        return $value;
    }

    public function readUInt16(): int
    {
        return $this->readUnpack($this->littleEndian ? 'v' : 'n', 2);
    }

    public function readInt32(): int
    {
        $value = $this->readUnpack($this->littleEndian ? 'V' : 'N', 4);
        if ($value >= 0x80000000) {
            $value -= 0x100000000;
        }
        return $value;
    }

    public function readUInt32(): int
    {
        return $this->readUnpack($this->littleEndian ? 'V' : 'N', 4);
    }

    public function readFloat(): float
    {
        $format = $this->littleEndian ? 'g' : 'G';
        return $this->readUnpack($format, 4);
    }

    public function readDouble(): float
    {
        $format = $this->littleEndian ? 'e' : 'E';
        return $this->readUnpack($format, 8);
    }

    public function readString(int $length): string
    {
        $this->checkAvailable($length);
        $result = substr($this->buffer, $this->position, $length);
        $this->position += $length;
        return $result;
    }

    public function readNullTerminatedString(): string
    {
        $endPos = strpos($this->buffer, "\0", $this->position);
        if ($endPos === false) {
            throw new Exception("Null terminator not found.");
        }
        $result = substr($this->buffer, $this->position, $endPos - $this->position);
        $this->position = $endPos + 1;
        return $result;
    }

    public function seek(int $offset): void
    {
        if ($offset < 0 || $offset > strlen($this->buffer)) {
            throw new Exception("Offset out of buffer limits.");
        }
        $this->position = $offset;
    }

    public function skip(int $length): void
    {
        $this->checkAvailable($length);
        $this->position += $length;
    }

    public function tell(): int
    {
        return $this->position;
    }

    public function length(): int
    {
        return strlen($this->buffer);
    }

    private function readUnpack(string $format, int $length)
    {
        $this->checkAvailable($length);
        $data = substr($this->buffer, $this->position, $length);
        $this->position += $length;
        $result = unpack($format, $data);
        return $result[1];
    }

    private function checkAvailable(int $length): void
    {
        if ($this->position + $length > strlen($this->buffer)) {
            throw new Exception("Attempt to read beyond the end of the buffer.");
        }
    }

    public function hasBytesAvailable(int $length = 1): bool
    {
        return ($this->position + $length) <= strlen($this->buffer);
    }
}
