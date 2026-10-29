<?php

class Book
{
    private $MaSach;
    private $TenSach;
    private $TacGia;
    private $NhaXuatBan;
    private $SoLuongTon;

    public function __construct($ma_sach, $ten_sach, $tac_gia, $nha_xuat_ban, $so_luong_ton)
    {
        $this->MaSach = $ma_sach;
        $this->TenSach = $ten_sach;
        $this->TacGia = $tac_gia;
        $this->NhaXuatBan = $nha_xuat_ban;
        $this->SoLuongTon = $so_luong_ton;
    }

    public function get_MaSach()
    {
        return $this->MaSach;
    }

    public function get_TenSach()
    {
        return $this->TenSach;
    }

    public function get_TacGia()
    {
        return $this->TacGia;
    }

    public function get_NhaXuatBan()
    {
        return $this->NhaXuatBan;
    }

    public function get_SoLuongTon()
    {
        return $this->SoLuongTon;
    }
}