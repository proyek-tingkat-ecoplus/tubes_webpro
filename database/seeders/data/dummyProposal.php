<?php

namespace Dummy;

class DummyProposal // Nama kelas diperbaiki ke PascalCase
{
    public static function get(): array
    {
        $data = [];
        for ($i = 0; $i < 48; $i++) {
            $startDate = date('Y-m-d', strtotime("+$i month", strtotime("2022-01-01")));
            $endDate = date('Y-m-d', strtotime("+1 month", strtotime($startDate)));
            $data[] = [
                "tanggal_pengajuan" => $startDate,
                "start_date" => $startDate,
                "end_date" => $endDate
            ];
        }
        return $data;
    }
}
