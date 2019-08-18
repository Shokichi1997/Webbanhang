-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 29, 2018 lúc 05:28 PM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `IDChucVu` int(11) NOT NULL,
  `TenChucVu` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chungloai`
--

CREATE TABLE `chungloai` (
  `IDChungLoai` int(11) NOT NULL,
  `TenChungLoai` varchar(150) CHARACTER SET utf8 NOT NULL,
  `MoTa` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chungloai`
--

INSERT INTO `chungloai` (`IDChungLoai`, `TenChungLoai`, `MoTa`) VALUES
(1, 'Tivi', 'Bao gồm các loại tivi'),
(2, 'Thiết bị âm thanh', 'Loa và tai nghe…'),
(3, 'Điện thoại', 'Điện thoại'),
(4, 'Máy tính bảng', 'Máy tính bảng'),
(5, 'Máy ảnh - Quay phim', 'Máy ảnh - Quay phim'),
(6, 'Laptop', 'Laptop - Máy tính xách tay - Máy tính cá nhân'),
(7, 'Linh kiện máy tính', 'Linh kiện cho máy tính desktop và máy laptop, cũng như các hệ máy vi tính'),
(8, 'Phụ kiện di động', 'Phụ kiện dành cho điện thoại, smart phone'),
(9, 'Thiết bị đeo công nghệ', 'Các thiết bị đeo trên tay, đeo trên mặt như kính, đồng hồ,..'),
(10, 'Thiết bị lưu trữ', 'Các thiết bị lưu trữ trong, ngoài, di động'),
(11, 'Thiết bị mạng', 'Thiết bị dùng thiết lập mạng hay liên quan đến đường mạng'),
(12, 'Thiết bị số', 'Các thiết bị tần số radio,…');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `IDHoaDon` int(11) NOT NULL,
  `IDSanPham` int(11) NOT NULL,
  `Gia` double NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `IDHoaDon` int(11) NOT NULL,
  `IDKhachHang` int(11) NOT NULL,
  `IDNVGiaoHang` int(11) NOT NULL,
  `NgayLap` date NOT NULL,
  `TongTien` double NOT NULL,
  `DiaChiGiaoHang` varchar(100) NOT NULL,
  `ThanhPho` varchar(50) NOT NULL,
  `SoDienThoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `IDKhachHang` int(11) NOT NULL,
  `TenKhachHang` varchar(50) CHARACTER SET utf8 NOT NULL,
  `DiaChi` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ThanhPho` varchar(50) CHARACTER SET utf8 NOT NULL,
  `SoDienThoai` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `IDUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `IDLoai` int(11) NOT NULL,
  `TenLoai` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `MoTa` text CHARACTER SET utf8,
  `IDChungLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`IDLoai`, `TenLoai`, `MoTa`, `IDChungLoai`) VALUES
(1, 'Smart Tivi', NULL, 1),
(2, 'Internet Tivi', NULL, 1),
(3, 'Tivi LED', NULL, 1),
(4, 'Tivi QLED', NULL, 1),
(5, 'TV OLED', NULL, 1),
(6, 'TV 4K', NULL, 1),
(7, 'Ti vi cao cấp', NULL, 1),
(8, 'Tai nghe', NULL, 2),
(9, 'Loa Bluetooth', NULL, 2),
(10, 'Loa vi tính', NULL, 2),
(11, 'Loa Hi-Fi, SoundBar và khác', NULL, 2),
(12, 'Máy ghi âm', NULL, 2),
(13, 'Máy MP3/MP4', NULL, 2),
(14, 'Micro', NULL, 2),
(15, 'Radio & Máy nghe CD', NULL, 2),
(16, 'Điện thoại phổ thông', NULL, 3),
(17, 'Điện thoại smart phone', NULL, 3),
(18, 'Máy tính bảng', NULL, 3),
(19, 'Máy ảnh DSLR', NULL, 4),
(20, 'Máy ảnh Mirroless', NULL, 4),
(21, 'Máy ảnh du lịch', NULL, 4),
(22, 'Máy ảnh chụp lấy liền', NULL, 4),
(23, 'Máy quay phim Sony', NULL, 4),
(24, 'Máy quay phim Canon', NULL, 4),
(25, 'Ultrabook', NULL, 5),
(26, 'Workstation', NULL, 5),
(27, 'Chromebook', NULL, 5),
(28, 'Laptop hybrid', NULL, 5),
(29, 'Laptop chơi game', NULL, 5),
(30, 'Laptop thông thường', NULL, 5),
(31, 'Quạt tản nhiệt', NULL, 6),
(32, 'Card âm thanh', NULL, 6),
(33, 'Ram máy tính', NULL, 6),
(34, 'Bo mạch chủ', NULL, 6),
(35, 'Bộ vi xử lý', NULL, 6),
(36, 'Card màn hình', NULL, 6),
(37, 'Nguồn máy tính', NULL, 6),
(38, 'Quạt (cho case)', NULL, 6),
(39, 'Pin sạc dự phòng', NULL, 7),
(40, 'Bộ sạc có dây', NULL, 7),
(41, 'Phụ kiện di dộng trên xe hơi', NULL, 7),
(42, 'Dock sạc và giá đỡ', NULL, 7),
(43, 'Miếng dán màn hình điện thoại', NULL, 7),
(44, 'Gậy chụp ảnh', NULL, 7),
(45, 'Ốp lưng và bao da', NULL, 7),
(46, 'Sim và thẻ cào', NULL, 7),
(47, 'Đồng hồ thông minh', NULL, 8),
(48, 'Vòng theo dõi vận động', NULL, 8),
(49, 'Máy thực tế ảo cho điện thoại', NULL, 8),
(50, 'Dây đeo smart watch', NULL, 8),
(51, 'Dây đeo smart band', NULL, 8),
(52, 'Thiết bị giám sát thông minh', NULL, 8),
(53, 'Mắt kính thông minh', NULL, 8),
(54, 'USB', NULL, 9),
(55, 'Ổ cứng găn ngoài', NULL, 9),
(56, 'Ổ cứng SSD gắn trong', NULL, 9),
(57, 'Ổ cứng gắn trong', NULL, 9),
(58, 'USB OTG', NULL, 9),
(59, 'Ổ cứng SSD gắn ngoài', NULL, 9),
(60, 'Thiết bị lưu trữ mạng NAS', NULL, 9),
(61, 'Bộ phát sóng wifi', NULL, 10),
(62, 'Bộ khuếch đại wifi', NULL, 10),
(63, 'Bộ thu sóng wifi', NULL, 10),
(64, 'Wifi Modems', NULL, 10),
(65, 'Bluetooth USB', NULL, 10),
(66, 'Router', NULL, 10),
(67, 'Switch', NULL, 10),
(68, 'Bộ đàm', NULL, 11),
(69, 'Bút laser', NULL, 11),
(70, 'Máy từ điển & thông dịch', NULL, 11),
(71, 'Thiết bị điều khiển qua App', NULL, 11),
(72, 'Bộ sạc đa năng', NULL, 11),
(73, 'Máy dò kim loại', NULL, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `IDNhaCungCap` int(11) NOT NULL,
  `TenNhaCungCap` varchar(50) CHARACTER SET utf8 NOT NULL,
  `NguoiDaiDien` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `DiaChi` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `SoDienThoai` int(11) DEFAULT NULL,
  `ThanhPho` varchar(50) DEFAULT NULL,
  `Websize` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`IDNhaCungCap`, `TenNhaCungCap`, `NguoiDaiDien`, `DiaChi`, `SoDienThoai`, `ThanhPho`, `Websize`) VALUES
(1, 'LG', NULL, NULL, NULL, NULL, NULL),
(2, 'Toshiba', NULL, NULL, NULL, NULL, NULL),
(3, 'Sony', NULL, NULL, NULL, NULL, NULL),
(4, 'Darling', NULL, NULL, NULL, NULL, NULL),
(5, 'Samsung', NULL, NULL, NULL, NULL, NULL),
(6, 'Asanzo', NULL, NULL, NULL, NULL, NULL),
(7, 'Skyworth', NULL, NULL, NULL, NULL, NULL),
(8, 'Toshiba', NULL, NULL, NULL, NULL, NULL),
(9, 'Apple', NULL, NULL, NULL, NULL, NULL),
(10, 'Anker', NULL, NULL, NULL, NULL, NULL),
(11, 'Awei', NULL, NULL, NULL, NULL, NULL),
(12, 'Bonoboss', NULL, NULL, NULL, NULL, NULL),
(13, 'BYZ', NULL, NULL, NULL, NULL, NULL),
(14, 'Cherub', NULL, NULL, NULL, NULL, NULL),
(15, 'Creative Technology', NULL, NULL, NULL, NULL, NULL),
(16, 'Edifier', NULL, NULL, NULL, NULL, NULL),
(17, 'Fenda', NULL, NULL, NULL, NULL, NULL),
(18, 'Goly', NULL, NULL, NULL, NULL, NULL),
(19, 'Gunners', NULL, NULL, NULL, NULL, NULL),
(20, 'Harman', NULL, NULL, NULL, NULL, NULL),
(21, 'HOCO', NULL, NULL, NULL, NULL, NULL),
(22, 'Intel', NULL, NULL, NULL, NULL, NULL),
(23, 'iSound', NULL, NULL, NULL, NULL, NULL),
(24, 'Itel', NULL, NULL, NULL, NULL, NULL),
(25, 'Jabra', NULL, NULL, NULL, NULL, NULL),
(26, 'JBL', NULL, NULL, NULL, NULL, NULL),
(27, 'Joway', NULL, NULL, NULL, NULL, NULL),
(28, 'JVC', NULL, NULL, NULL, NULL, NULL),
(29, 'LightSync', NULL, NULL, NULL, NULL, NULL),
(30, 'Logitech', NULL, NULL, NULL, NULL, NULL),
(31, 'Marshall', NULL, NULL, NULL, NULL, NULL),
(32, 'Masstel', NULL, NULL, NULL, NULL, NULL),
(33, 'MAXX', NULL, NULL, NULL, NULL, NULL),
(34, 'Microlab', NULL, NULL, NULL, NULL, NULL),
(35, 'Microtek', NULL, NULL, NULL, NULL, NULL),
(36, 'MiPow', NULL, NULL, NULL, NULL, NULL),
(37, 'Sennheiser', NULL, NULL, NULL, NULL, NULL),
(38, 'Sharp', NULL, NULL, NULL, NULL, NULL),
(39, 'Skyworth', NULL, NULL, NULL, NULL, NULL),
(40, 'SoundMax', NULL, NULL, NULL, NULL, NULL),
(41, 'Suntex', NULL, NULL, NULL, NULL, NULL),
(42, 'Suoxu', NULL, NULL, NULL, NULL, NULL),
(43, 'Tangent', NULL, NULL, NULL, NULL, NULL),
(44, 'TCL', NULL, NULL, NULL, NULL, NULL),
(45, 'Teac', NULL, NULL, NULL, NULL, NULL),
(46, 'Titan', NULL, NULL, NULL, NULL, NULL),
(47, 'Toshiba', NULL, NULL, NULL, NULL, NULL),
(48, 'Transcend', NULL, NULL, NULL, NULL, NULL),
(49, 'TRANSHINE', NULL, NULL, NULL, NULL, NULL),
(50, 'Trust', NULL, NULL, NULL, NULL, NULL),
(51, 'V-MODA', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDNhanVien` int(11) NOT NULL,
  `TenNhanVien` varchar(50) CHARACTER SET utf8 NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `NgayVaoLam` date DEFAULT NULL,
  `GioiTinh` varchar(7) CHARACTER SET utf8 DEFAULT NULL,
  `DiaChi` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `IDThanhPho` int(11) DEFAULT NULL,
  `SoDienThoai` int(11) DEFAULT NULL,
  `Hinh` varchar(50) DEFAULT NULL,
  `TenDangNhap` varchar(50) DEFAULT NULL,
  `MatKhau` varchar(50) DEFAULT NULL,
  `IDChucVu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_xa`
--

CREATE TABLE `phuong_xa` (
  `IDPhuong_Xa` int(11) NOT NULL,
  `IDQuan_Huyen` int(11) NOT NULL,
  `TenPhuong_Xa` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_huyen`
--

CREATE TABLE `quan_huyen` (
  `IDQuan_Huyen` int(11) NOT NULL,
  `TenQuan_Huyen` varchar(50) CHARACTER SET utf8 NOT NULL,
  `IDThanhPho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(250) CHARACTER SET utf8 NOT NULL,
  `IDLoai` int(11) NOT NULL,
  `IDNhaCungCap` int(11) NOT NULL,
  `GiaGoc` double DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `Hinh` varchar(30) DEFAULT NULL,
  `GiaNhapHang` double DEFAULT NULL,
  `NgayNhapHang` date DEFAULT NULL,
  `GiamGia` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`IDSanPham`, `TenSanPham`, `IDLoai`, `IDNhaCungCap`, `GiaGoc`, `SoLuong`, `Hinh`, `GiaNhapHang`, `NgayNhapHang`, `GiamGia`) VALUES
(1, 'Smart Tivi LG 55 inch 4K UHD 55UJ632T', 1, 1, 24000000, 10, '1.jpg', 1500000, NULL, NULL),
(2, 'Smart Tivi LG 43 inch Full HD 43LJ550T', 1, 1, 1000000, 10, '2.jpg', 1500000, NULL, NULL),
(3, 'Smart Tivi Toshiba 43 inch 4K 43U7650', 1, 1, 10000000, 10, '3.jpg', 1500000, NULL, NULL),
(4, 'Smart Tivi LG 43 inch 4K UHD 43UJ632T', 1, 1, 12, 10, '4.jpg', 1500000, NULL, NULL),
(5, 'Android Tivi 4K Sony 43 inch KD-43X8000E', 1, 1, 16, 10, '5.jpg', 1500000, NULL, NULL),
(6, 'Android Tivi Sony Full HD 43 inch KDL-43W800F', 1, 1, 13, 10, '6', 1500000, NULL, NULL),
(7, 'Smart Tivi Darling 40 inch Full HD 40HD959T2', 1, 1, 6, 10, '7', 1500000, NULL, NULL),
(8, 'Android Tivi Sony Full HD 49 inch KDL-49W800F', 1, 1, 17, 10, '8', 1500000, NULL, NULL),
(9, 'Internet Tivi Samsung 32 inch UA32J4303DK', 1, 1, 7, 10, '9', 1500000, NULL, NULL),
(10, 'Smart Tivi Màn Hình Cong Asanzo 32 inch AS32CS6000', 1, 1, 4, 10, '10', 1500000, NULL, NULL),
(11, 'Smart Tivi LED LG 32 inch HD 32LJ550D', 1, 1, 6, 10, '11', 1500000, NULL, NULL),
(12, 'Smart Tivi LG 32 inch 32LJ571D', 1, 1, 7, 10, '12', 1500000, NULL, NULL),
(13, 'Smart Tivi Sony 75 inch 4K KD-75X8500E', 1, 1, 83, 10, '13', 1500000, NULL, NULL),
(14, 'Smart Tivi LG 49 inch 4K UHD 49UJ632T', 1, 1, 19, 10, '14', 1500000, NULL, NULL),
(15, 'Smart TiVi Samsung 4K UHD 40 inch UA40MU6100KXXV', 1, 1, 16, 10, '15', 1500000, NULL, NULL),
(16, 'Smart Tivi 4K Sony 75 inch KD-75X8500D', 1, 1, 86, 10, '16', 1500000, NULL, NULL),
(17, 'Android Tivi Sony 49 inch 4K KD-49X8000E', 1, 1, 22, 10, '17', 1500000, NULL, NULL),
(18, 'Smart Tivi Samsung 40 inch 4K UHD UA40MU6103', 1, 1, 12, 10, '18', 1500000, NULL, NULL),
(19, 'Smart Tivi Asanzo 32 inch HD 32E800', 1, 1, 4, 10, '19', 1500000, NULL, NULL),
(20, 'Smart Tivi Sony HD 32 inch KDL-32W610F', 1, 1, 8, 10, '20', 1500000, NULL, NULL),
(21, 'Smart Tivi 4K Skyworth 50 inch 50K820S', 1, 1, 12, 10, '21', 1500000, NULL, NULL),
(22, 'Smart Tivi Samsung 55 inch UHD 4K UA55MU6103', 1, 1, 21, 10, '22', 1500000, NULL, NULL),
(23, 'Android Tivi Sony 55 inch 4K KD-55X8500F', 1, 1, 32, 10, '23', 1500000, NULL, NULL),
(24, 'Android Tivi Toshiba 49 inch Ultra HD 4K 49U7750', 1, 1, 17, 10, '24', 1500000, NULL, NULL),
(25, 'Smart Tivi Asanzo Cường Lực 55 inch Full HD 55SK900', 1, 1, 10, 10, '25', 1500000, NULL, NULL),
(26, 'Smart Tivi Toshiba 43 inch 4K 43U6750', 1, 1, 11, 10, '26', 1500000, NULL, NULL),
(27, 'Android Tivi Sony 49 inch 4K KD-49X8500F/S', 1, 1, 23, 10, '27', 1500000, NULL, NULL),
(28, 'Smart Tivi LG 43 inch 4K SUHD 43UJ750T', 1, 1, 17, 10, '28', 1500000, NULL, NULL),
(29, 'Smart Tivi Sony Full HD 50 inch KDL-50W660F', 1, 1, 15, 10, '29', 1500000, NULL, NULL),
(30, 'Smart Tivi Asanzo 32 inch HD 32E800', 1, 1, 4, 10, '30', 1500000, NULL, NULL),
(31, 'Internet Tivi Samsung 32 inch UA32J4303DK', 2, 1, 7, 10, '31', 1500000, NULL, NULL),
(32, 'Internet Tivi Sony 40 inch KDL-40W650D', 2, 1, 11, 10, '32', 1500000, NULL, NULL),
(33, 'Internet Tivi Sony 32 inch KDL-32W600D', 2, 1, 9, 10, '33', 1500000, NULL, NULL),
(34, 'Internet Tivi Samsung 40 inch UA40J5200DK', 2, 1, 9, 10, '34', 1500000, NULL, NULL),
(35, 'Internet Tivi TCL 32 inch L32S4900', 2, 1, 5, 10, '35', 1500000, NULL, NULL),
(36, 'Internet Tivi Sony 48 inch KDL- 48W650D', 2, 1, 16, 10, '36', 1500000, NULL, NULL),
(37, 'Internet Tivi Samsung 40 inch UA40J5200', 2, 1, 9, 10, '37', 1500000, NULL, NULL),
(38, 'Internet Tivi Sony 49 inch KDL-49W750E', 2, 1, 19, 10, '38', 1500000, NULL, NULL),
(39, 'Internet Tivi Sony 65 inch 4K KD-65X7000E', 2, 1, 36, 10, '39', 1500000, NULL, NULL),
(40, 'Internet Tivi Sony 40 inch KDL-40W660E', 2, 1, 12, 10, '40', 1500000, NULL, NULL),
(41, 'Internet Tivi LED TCL 49 inch L49S4900', 2, 1, 9, 10, '41', 1500000, NULL, NULL),
(42, 'Internet Tivi Sony 49 inch KDL-49W660E', 2, 1, 18, 10, '42', 1500000, NULL, NULL),
(43, 'Internet Tivi Panasonic 43 inch Full HD TH-43ES500V', 2, 1, 11, 10, '43', 1500000, NULL, NULL),
(44, 'Internet Tivi Panasonic 49 inch Full HD TH-49ES500V', 2, 1, 15, 10, '44', 1500000, NULL, NULL),
(45, 'Tivi LED Panasonic 32 inch TH-32E400V', 3, 1, 6, 10, '45', 1500000, NULL, NULL),
(46, 'Tivi LED Sharp 32 inch LC-32LE280X', 3, 1, 4, 10, '46', 1500000, NULL, NULL),
(47, 'Tivi LED Asanzo 32 inch HD 32S810', 3, 1, 3, 10, '47', 1500000, NULL, NULL),
(48, 'Tivi LED Toshiba 40 inch Full HD 40L3750', 3, 1, 7, 10, '48', 1500000, NULL, NULL),
(49, 'Tivi LED ASANZO 32 inch 32T660', 3, 1, 3, 10, '49', 1500000, NULL, NULL),
(50, 'Smart Tivi Asanzo 65 inch 65SK900 Cường Lực', 3, 1, 21, 10, '50', 1500000, NULL, NULL),
(51, 'Tivi LED Asanzo 25 inch 25S200', 3, 1, 2, 10, '51', 1500000, NULL, NULL),
(52, 'Tivi LED Asanzo 32 inch ES32T800', 3, 1, 3, 10, '52', 1500000, NULL, NULL),
(53, 'Tivi LED Samsung 40 inch UA40M5000AKXXV', 3, 1, 9, 10, '53', 1500000, NULL, NULL),
(54, 'Tivi LED ASANO 25 inch 25DF2200', 3, 1, 2, 10, '54', 1500000, NULL, NULL),
(55, 'Tivi LED ASANO 32 inch E32DF2200', 3, 1, 3, 10, '55', 1500000, NULL, NULL),
(56, 'Tivi LED Asanzo 25 inch 25T350', 3, 1, 2, 10, '56', 1500000, NULL, NULL),
(57, 'Tivi LED ASANO 40 inch E40DF2200', 3, 1, 5, 10, '57', 1500000, NULL, NULL),
(58, 'Tivi LED Samsung 32 inch UA32J4003DK', 3, 1, 6, 10, '58', 1500000, NULL, NULL),
(59, 'Tivi LED Asanzo 32 inch HD 32T880', 3, 1, 3, 10, '59', 1500000, NULL, NULL),
(60, 'Smart Tivi LED Toshiba 40 inch 40L5650', 3, 1, 7, 10, '60', 1500000, NULL, NULL),
(61, 'Tivi LED ASANZO 32 inch 32S610', 3, 1, 3, 10, '61', 1500000, NULL, NULL),
(62, 'Tivi LED Asanzo Full HD 50 inch 50T890', 3, 1, 7, 10, '62', 1500000, NULL, NULL),
(63, 'Tivi Toshiba 32 inch 32L3750', 3, 1, 5, 10, '63', 1500000, NULL, NULL),
(64, 'Tivi LED Philips 32 inch HD 32PHT4052S/67', 3, 1, 4, 10, '64', 1500000, NULL, NULL),
(65, 'Smart Tivi Samsung 40 inch UA40K5500', 3, 1, 11, 10, '65', 1500000, NULL, NULL),
(66, 'Tivi LED Sony 32 inch KDL-32R300E', 3, 1, 7, 10, '66', 1500000, NULL, NULL),
(67, 'Tivi LED Sony 40 inch KDL-40R350E', 3, 1, 10, 10, '67', 1500000, NULL, NULL),
(68, 'Smart Tivi ASANZO 50 inch 50SK900 Cường Lực', 3, 1, 9, 10, '68', 1500000, NULL, NULL),
(69, 'Tivi LED Asanzo 32 inch 32S800', 3, 1, 3, 10, '69', 1500000, NULL, NULL),
(70, 'Tivi LED Darling 24 inch HD 24HD900T2', 3, 1, 3, 10, '70', 1500000, NULL, NULL),
(71, 'Tivi LED Samsung 49 inch UA49K5100', 3, 1, 12, 10, '71', 1500000, NULL, NULL),
(72, 'Tivi LED Asanzo 43 inch Full HD 43AT500', 3, 1, 5, 10, '72', 1500000, NULL, NULL),
(73, 'Tivi LED Asanzo 32 inch 32AT120', 3, 1, 3, 10, '73', 1500000, NULL, NULL),
(74, 'Tivi LED Samsung 32 inch UA32J4003', 3, 1, 6, 10, '74', 1500000, NULL, NULL),
(75, 'Tivi LED Asanzo 20 inch HD 20K150', 3, 1, 1, 10, '75', 1500000, NULL, NULL),
(76, 'Smart Tivi Samsung 65 inch QLED 4K QA65Q7FNAKXXV', 4, 1, 84, 10, '76', 1500000, NULL, NULL),
(77, 'Smart Tivi Samsung 55 inch QLED 4K QA55Q8CNAKXXV', 4, 1, 69, 10, '77', 1500000, NULL, NULL),
(78, 'Smart Tivi Samsung 75 inch QLED 4K QA75Q9FNAKXXV', 4, 1, 209, 10, '78', 1500000, NULL, NULL),
(79, 'Smart Tivi Samsung 75 inch QLED 4K QA75Q7FNAKXXV', 4, 1, 135, 10, '79', 1500000, NULL, NULL),
(80, 'Smart Tivi Samsung 55 inch QLED 4K QA55Q7FNAKXXV', 4, 1, 59, 10, '80', 1500000, NULL, NULL),
(81, 'Smart TV 4K Samsung QLED 65 inch QA65Q7FAMKXXV', 4, 1, 89, 10, '81', 1500000, NULL, NULL),
(82, 'Smart TV 4K Samsung QLED 55 inch QA55Q7FAMKXXV', 4, 1, 64, 10, '82', 1500000, NULL, NULL),
(83, 'Smart TV Cong 4K Samsung QLED 55 inch QA55Q8CAMKXXV', 4, 1, 74, 10, '83', 1500000, NULL, NULL),
(84, 'Smart TV 4K Samsung QLED 75 inch QA75Q7FAMKXXV', 4, 1, 129, 10, '84', 1500000, NULL, NULL),
(85, 'Smart TV Cong 4K Samsung QLED 65 inch QA65Q8CAMKXXV', 4, 1, 105, 10, '85', 1500000, NULL, NULL),
(86, 'Smart Tivi Samsung 65 inch QLED 4K QA65Q8CNAKXXV', 4, 1, 96, 10, '86', 1500000, NULL, NULL),
(87, 'Smart Tivi Cong OLED LG 55 inch 55EG910T', 5, 1, 56, 10, '87', 1500000, NULL, NULL),
(88, 'Android Tivi OLED Sony 65 inch 4K KD-65A1', 5, 1, 99, 10, '88', 1500000, NULL, NULL),
(89, 'Android Tivi OLED Sony 55 inch 4K KD-55A1', 5, 1, 67, 10, '89', 1500000, NULL, NULL),
(90, 'Smart Tivi Toshiba 43 inch 4K 43U7650', 6, 1, 10, 10, '90', 1500000, NULL, NULL),
(91, 'Smart Tivi LG 43 inch 4K UHD 43UJ632T', 6, 1, 12, 10, '91', 1500000, NULL, NULL),
(92, 'Smart Tivi LG 55 inch 4K UHD 55UJ632T', 6, 1, 24, 10, '92', 1500000, NULL, NULL),
(93, 'Android Tivi 4K Sony 43 inch KD-43X8000E - Đen', 6, 1, 16, 10, '93', 1500000, NULL, NULL),
(94, 'Smart Tivi Samsung 43 inch 4K UHD UA43MU6400KXXV', 6, 1, 15, 10, '94', 1500000, NULL, NULL),
(95, 'Smart Tivi LG 49 inch 4K UHD 49UJ632T', 6, 1, 19, 10, '95', 1500000, NULL, NULL),
(96, 'Smart Tivi TCL 50 inch 4K UHD L50P62-UF', 6, 1, 11, 10, '96', 1500000, NULL, NULL),
(97, 'Smart Tivi Sony 55 inch 4K KD-55X7000E', 6, 1, 25, 10, '97', 1500000, NULL, NULL),
(98, 'Tivi Sharp 40 inch 4K UHD LC-40UA330X', 6, 1, 8, 10, '98', 1500000, NULL, NULL),
(99, 'Android Tivi Sony 49 inch 4K KD-49X8500F/S', 6, 1, 23, 10, '99', 1500000, NULL, NULL),
(100, 'Smart Tivi Samsung 49 inch UHD 4K', 6, 1, 23, 10, '100', 1500000, NULL, NULL),
(101, 'Smart Tivi 4K Skyworth 50 inch 50K820S', 6, 1, 12, 10, '101', 1500000, NULL, NULL),
(102, 'Smart Tivi Samsung 43 inch UHD 4K', 6, 1, 16, 10, '102', 1500000, NULL, NULL),
(103, 'Smart Tivi TCL 40 inch 4K UHD L40P62-UF', 6, 1, 8, 10, '103', 1500000, NULL, NULL),
(104, 'Smart Tivi Cong OLED LG 55 inch 55EG910T', 6, 1, 56, 10, '104', 1500000, NULL, NULL),
(105, 'Smart Tivi Samsung 55 inch UHD 4K', 6, 1, 35, 10, '105', 1500000, NULL, NULL),
(106, 'Smart Tivi 4K LG 49 inch 49UH650T', 6, 1, 21, 10, '106', 1500000, NULL, NULL),
(107, 'Smart Tivi Cong 4K Sony 55 inch KD-55S8500D', 6, 1, 44, 10, '107', 1500000, NULL, NULL),
(108, 'Smart Tivi Samsung 65 inch UHD 4K', 6, 1, 50, 10, '108', 1500000, NULL, NULL),
(109, 'Android Tivi Sony 55 inch 4K KD-55X9000F', 6, 1, 39, 10, '109', 1500000, NULL, NULL),
(110, 'Smart Tivi Samsung 55 inch UHD 4K', 6, 1, 31, 10, '110', 1500000, NULL, NULL),
(111, 'Smart Tivi Samsung 65 inch UHD 4K', 6, 1, 57, 10, '111', 1500000, NULL, NULL),
(112, 'Smart Tivi LG 65 inch 4K UHD 65UJ632T', 7, 1, 45, 10, '112', 1500000, NULL, NULL),
(113, 'Android Tivi Sony 49 inch 4K KD-49X8000E', 7, 1, 22, 10, '113', 1500000, NULL, NULL),
(114, 'Smart Tivi 4K Sony 75 inch KD-75X8500D', 7, 1, 86, 10, '114', 1500000, NULL, NULL),
(115, 'Smart Tivi Sony 55 inch 4K KD-55X7000E', 7, 1, 25, 10, '115', 1500000, NULL, NULL),
(116, 'Smart Tivi Sony 75 inch 4K KD-75X8500E', 7, 1, 83, 10, '116', 1500000, NULL, NULL),
(117, 'Smart Tivi Sony 49 inch 4K KD-49X9000E', 7, 1, 34, 10, '117', 1500000, NULL, NULL),
(118, 'Smart Tivi Màn Hình Cong Samsung 49 inch UA49MU6500KXXV', 7, 1, 26, 10, '118', 1500000, NULL, NULL),
(119, 'Android Tivi Sony 55 inch 4K KD-55X8000E - Bạc', 7, 1, 30, 10, '119', 1500000, NULL, NULL),
(120, 'Smart Tivi Sony 55 inch 4K KD-55X9000E - Bạc', 7, 1, 41, 10, '120', 1500000, NULL, NULL),
(121, 'Smart Tivi LED Samsung 55 inch 55MU6400', 7, 1, 34, 10, '121', 1500000, NULL, NULL),
(122, 'Smart Tivi Samsung Cong 49 inch Premium UHD UA49MU8000KXXV', 7, 1, 36, 10, '122', 1500000, NULL, NULL),
(123, 'Smart Tivi LG 49 inch 4K SUHD 49UJ750T', 7, 1, 23, 10, '123', 1500000, NULL, NULL),
(124, 'Smart Tivi Sony 65 inch 4K HDR KD-65X9000E', 7, 1, 65, 10, '124', 1500000, NULL, NULL),
(125, 'Smart Tivi Màn Hình Phẳng 4K QLED Samsung 49 inch QA49Q7FAMKXXV', 7, 1, 39, 10, '125', 1500000, NULL, NULL),
(126, 'Smart TV 4K Samsung QLED 65 inch QA65Q7FAMKXXV', 7, 1, 89, 10, '126', 1500000, NULL, NULL),
(127, 'Internet Tivi Sony 65 inch 4K KD-65X7000E', 7, 1, 36, 10, '127', 1500000, NULL, NULL),
(128, 'Smart Tivi Cong OLED LG 55 inch 55EG910T', 7, 1, 56, 10, '128', 1500000, NULL, NULL),
(129, 'Smart TV 4K Samsung QLED 55 inch QA55Q7FAMKXXV', 7, 1, 64, 10, '129', 1500000, NULL, NULL),
(130, 'Smart TV Cong 4K Samsung QLED 55 inch QA55Q8CAMKXXV', 7, 1, 74, 10, '130', 1500000, NULL, NULL),
(131, 'Smart Tivi Sony 55 inch 4K KD-55X9000E - Đen', 7, 1, 41, 10, '131', 1500000, NULL, NULL),
(132, 'Smart Tivi LG 55 inch 4K UHD 55UJ750T', 7, 1, 33, 10, '132', 1500000, NULL, NULL),
(133, 'Android Tivi OLED Sony 65 inch 4K KD-65A1', 7, 1, 99, 10, '133', 1500000, NULL, NULL),
(134, 'Smart Tivi LED Samsung 65 inch UA65MU6400KXXV', 7, 1, 54, 10, '134', 1500000, NULL, NULL),
(135, 'Tai Nghe Nhét Tai Apple Airpods Wireless MMEF2ZA/A - Hàng Chính Hãng', 8, 1, 4, 10, '135', 1500000, NULL, NULL),
(136, 'Tai Nghe Chụp Tai Sennheiser HD 4.20s - Hàng Chính Hãng', 8, 1, 2, 10, '136', 1500000, NULL, NULL),
(137, 'Tai Nghe Bluetooth Nhét Tai Jabra Elite Sport - Version 2017 - Hàng Chính Hãng', 8, 1, 6, 10, '137', 1500000, NULL, NULL),
(138, 'Tai Nghe JBL T450BT - Hàng Chính Hãng', 8, 1, 1, 10, '138', 1500000, NULL, NULL),
(139, 'Tai Nghe Nhét Tai Langsdom Super Bass JM26 - Hàng Nhập Khẩu', 8, 1, 118, 10, '139', 1500000, NULL, NULL),
(140, 'Tai Nghe Nhét Tai BYZ S389 - Hàng Chính Hãng', 8, 1, 89, 10, '140', 1500000, NULL, NULL),
(141, 'Tai Nghe Nhét Tai Sony Extra Bass MDR-XB55AP - Hàng Chính Hãng', 8, 1, 890, 10, '141', 1500000, NULL, NULL),
(142, 'Tai Nghe Chụp Tai JVC HA-S220 - Hàng Chính Hãng', 8, 1, 590, 10, '142', 1500000, NULL, NULL),
(143, 'Tai Nghe Nhét Tai Samsung Galaxy S6 - Hàng Nhập Khẩu', 8, 1, 109, 10, '143', 1500000, NULL, NULL),
(144, 'Tai Nghe Thể Thao Suoxu Stereo SX538', 8, 1, 99, 10, '144', 1500000, NULL, NULL),
(145, 'Tai Nghe Sennheiser MX 80 Nhét Tai', 8, 1, 165, 10, '145', 1500000, NULL, NULL),
(146, 'Tai Nghe Bluetooth JBL T110BT - Hàng Chính Hãng', 8, 1, 890, 10, '146', 1500000, NULL, NULL),
(147, 'Tai Nghe Extra Bass Sony MDR-XB550AP - Hàng Chính Hãng', 8, 1, 1, 10, '147', 1500000, NULL, NULL),
(148, 'Tai Nghe V-MODA M80 Vocal Shadow', 8, 1, 3, 10, '148', 1500000, NULL, NULL),
(149, 'Tai nghe Sennheiser HD 25 Light Trên Tai', 8, 1, 4, 10, '149', 1500000, NULL, NULL),
(150, 'Tai Nghe Có Dây HOCO M1 - Hàng Chính Hãng', 8, 1, 99, 10, '150', 1500000, NULL, NULL),
(151, 'Tai Nghe Bluetooth Nhét Tai Anker SoundBuds Curve A3263 - Hàng Chính Hãng', 8, 1, 1, 10, '151', 1500000, NULL, NULL),
(152, 'Tai Nghe Bluetooth JBL Synchros E50BT - Hàng Chính Hãng', 8, 1, 3, 10, '152', 1500000, NULL, NULL),
(153, 'Tai Nghe Sony Fontopia MDR-E9LP Nhét Tai', 8, 1, 199, 10, '153', 1500000, NULL, NULL),
(154, 'Tai Nghe Supper Bass Cho iPhone Titan TN02 - Trắng - Hàng Chính Hãng', 8, 1, 150, 10, '154', 1500000, NULL, NULL),
(155, 'Tai Nghe Nhét Tai JBL Grip 200 - Hàng Chính Hãng', 8, 1, 500, 10, '155', 1500000, NULL, NULL),
(156, 'Tai Nghe Nhét Tai 1More Piston Classic - Hàng Nhập Khẩu', 8, 1, 399, 10, '156', 1500000, NULL, NULL),
(157, 'Tai Nghe Bluetooth Earbuds Promate TrueBlue-2 Kèm Ốp Sạc - Trắng', 8, 1, 1, 10, '157', 1500000, NULL, NULL),
(158, 'Tai Nghe Audio-Technica ATH-SR5 Trên Tai', 8, 1, 3, 10, '158', 1500000, NULL, NULL),
(159, 'Tai Nghe Sennheiser HD 202 II Chụp Tai', 8, 1, 699, 10, '159', 1500000, NULL, NULL),
(160, 'Tai Nghe Bluetooth Anker Soundbuds Sport NB10 - A3260 - Hàng Chính Hãng', 8, 1, 1, 10, '160', 1500000, NULL, NULL),
(161, 'Tai Nghe Nhét Tai JBL T210', 8, 1, 490, 10, '161', 1500000, NULL, NULL),
(162, 'Tai Nghe Nhét Tai Sony MDR-EX155AP - Hàng Chính Hãng', 8, 1, 690, 10, '162', 1500000, NULL, NULL),
(163, 'Tai Nghe Bluetooth Awei A920BL Wireless Sport Headphones iOS/Android V4.1 - Đen', 8, 1, 490, 10, '163', 1500000, NULL, NULL),
(164, 'Tai Nghe Sennheiser HD 558 East Chụp Tai', 8, 1, 3, 10, '164', 1500000, NULL, NULL),
(165, 'Loa Bluetooth X-mini Click 2 3W - Hàng Chính Hãng', 9, 1, 790, 10, '165', 1500000, NULL, NULL),
(166, 'Loa Bluetooth X-mini Click 1 2W - Hàng Chính Hãng', 9, 1, 590, 10, '166', 1500000, NULL, NULL),
(167, 'Loa Bluetooth JBL Flip 3 - Special Edition', 9, 1, 2, 10, '167', 1500000, NULL, NULL),
(168, 'Loa Bluetooth Anker Soundcore Mini - A3101 - Hàng Chính Hãng', 9, 1, 800, 10, '168', 1500000, NULL, NULL),
(169, 'Loa Thông Minh Amazon Echo Dot 2nd Generation (Trắng) - Hàng Nhập Khẩu', 9, 1, 1, 10, '169', 1500000, NULL, NULL),
(170, 'Loa Bluetooth Philips NN-BT2200B/27 (Trắng) - Hàng Nhập Khẩu', 9, 1, 1, 10, '170', 1500000, NULL, NULL),
(171, 'Loa Bluetooth Docking Philips DS7880 Cho Iphone 5/5S (Đen) - Hàng Nhập Khẩu', 9, 1, 2, 10, '171', 1500000, NULL, NULL),
(172, 'Loa Bluetooth Harman Kardon Onyx Studio 3 60W - Hàng Chính Hãng', 9, 1, 3, 10, '172', 1500000, NULL, NULL),
(173, 'Loa Bluetooth Anker Soundcore Nano A3104 (3W) - Hàng Chính Hãng', 9, 1, 500, 10, '173', 1500000, NULL, NULL),
(174, 'Loa Bluetooth JBL Flip 3', 9, 1, 2, 10, '174', 1500000, NULL, NULL),
(175, 'Loa Bluetooth JBL Clip 2', 9, 1, 1, 10, '175', 1500000, NULL, NULL),
(176, 'Loa Bluetooth SoundMax R-100/4.0 3W - Hàng Chính Hãng', 9, 1, 269, 10, '176', 1500000, NULL, NULL),
(177, 'Loa Đèn LED Bluetooth MiPow PlayBulb Zoocoro Air Whale - Hàng Chính Hãng', 9, 1, 1, 10, '177', 1500000, NULL, NULL),
(178, 'Loa Bluetooth Sony SRS-XB10 (5W) - Hàng Chính Hãng', 9, 1, 1, 10, '178', 1500000, NULL, NULL),
(179, 'Loa Vi Tính Bluetooth Microlab M-106BT 2.1 (10W) - Hàng Chính Hãng', 9, 1, 600, 10, '179', 1500000, NULL, NULL),
(180, 'Loa Bluetooth Promate Rustic-2 IP5X Chống Thấm Nước 6W - Xanh Dương', 9, 1, 790, 10, '180', 1500000, NULL, NULL),
(181, 'Loa Bluetooth Marshall Acton - Hàng Nhập Khẩu', 9, 1, 7, 10, '181', 1500000, NULL, NULL),
(182, 'Loa Bluetooth Joway BM139 - Hàng Chính Hãng', 9, 1, 300, 10, '182', 1500000, NULL, NULL),
(183, 'Loa Bluetooth Joway BM050 - Hàng Chính Hãng', 9, 1, 400, 10, '183', 1500000, NULL, NULL),
(184, 'Loa Bluetooth Anker SoundCore 6W - A3102', 9, 1, 1, 10, '184', 1500000, NULL, NULL),
(185, 'Loa Bluetooth JBL GO', 9, 1, 790, 10, '185', 1500000, NULL, NULL),
(186, 'Loa Gaming Logitech G560 2.1 Bluetooth LightSync (240W) - Hàng Chính Hãng', 10, 1, 5, 10, '186', 1500000, NULL, NULL),
(187, 'Loa Vi Tính Microlab B51 2.0 (4W) - Hàng Chính Hãng', 10, 1, 300, 10, '187', 1500000, NULL, NULL),
(188, 'Loa vi tính Logitech Z906 5.1', 10, 1, 5, 10, '188', 1500000, NULL, NULL),
(189, 'Loa Vi Tính Microlab Solo 9C 2.0', 10, 1, 5, 10, '189', 1500000, NULL, NULL),
(190, 'Loa Vi Tính Microlab M-108 2.1 (11W) - Hàng Chính Hãng', 10, 1, 429, 10, '190', 1500000, NULL, NULL),
(191, 'Loa Vi Tính Microlab M-300 2.1 (38W) - Hàng Chính Hãng', 10, 1, 735, 10, '191', 1500000, NULL, NULL),
(192, 'Loa Vi Tính iSound SP230B 2.1 40W', 10, 1, 2, 10, '192', 1500000, NULL, NULL),
(193, 'Loa Vi Tính Microlab B16 2.0 5W', 10, 1, 169, 10, '193', 1500000, NULL, NULL),
(194, 'Loa Vi Tính Microlab Solo 6C 2.0 100W', 10, 1, 2, 10, '194', 1500000, NULL, NULL),
(195, 'Loa Vi Tính SoundMax A-130/2.0 6W - Hàng Chính Hãng', 10, 1, 145, 10, '195', 1500000, NULL, NULL),
(196, 'Loa Vi Tính Bonoboss BOS-N303 2.1 65W', 10, 1, 2, 10, '196', 1500000, NULL, NULL),
(197, 'Loa Bluetooth Soundmax M-2 Kèm Micro (40W) - Hàng Chính Hãng', 10, 1, 1, 10, '197', 1500000, NULL, NULL),
(198, 'Loa Bluetooth FENDA F210X 15W', 10, 1, 940, 10, '198', 1500000, NULL, NULL),
(199, 'Loa Vi Tính Soundmax SB-217/2.1 Tích Hợp Bluetooth (90W) - Hàng Chính Hãng', 10, 1, 2, 10, '199', 1500000, NULL, NULL),
(200, 'Loa RUIZU RS110 (6W) - Màu Ngẫu Nhiên', 10, 1, 95, 10, '200', 1500000, NULL, NULL),
(201, 'Loa Vi Tính Microlab FC-362 2.1+1 54W', 10, 1, 2, 10, '201', 1500000, NULL, NULL),
(202, 'Loa Vi Tính Logitech Z623 2.1 (200W) - Hàng Chính Hãng', 10, 1, 3, 10, '202', 1500000, NULL, NULL),
(203, 'Loa Vi Tính Microlab M-200 2.1 40W', 10, 1, 899, 10, '203', 1500000, NULL, NULL),
(204, 'Loa Vi Tính SoundMax A-150/2.0 10W - Hàng Chính Hãng', 10, 1, 275, 10, '204', 1500000, NULL, NULL),
(205, 'Loa Vi Tính SoundMax A-850/2.1 25W - Hàng Chính Hãng', 10, 1, 588, 10, '205', 1500000, NULL, NULL),
(206, 'Loa Vi Tính SoundMax A-2100/2.1 60W - Hàng Chính Hãng', 10, 1, 1, 10, '206', 1500000, NULL, NULL),
(207, 'Loa Vi Tính Logitech Z213 2.1 (14W) - Hàng Chính Hãng', 10, 1, 599, 10, '207', 1500000, NULL, NULL),
(208, 'Loa Vi Tính Edifier XM2PF 2.1', 10, 1, 1, 10, '208', 1500000, NULL, NULL),
(209, 'Loa Vi Tính SoundMax A-4000/4.1 60W - Hàng Chính Hãng', 10, 1, 995, 10, '209', 1500000, NULL, NULL),
(210, 'Loa Vi Tính 4.1 Microtek MT-665BT - 70W', 10, 1, 1, 10, '210', 1500000, NULL, NULL),
(211, 'Loa Vi Tính 2.1 RUIZU G20 (Xanh Phối Đen) - Hàng Nhập Khẩu', 10, 1, 270, 10, '211', 1500000, NULL, NULL),
(212, 'Loa Tangent Audio Fjord dock by Jacob - TBFJORDDOCK', 11, 1, 6, 10, '212', 1500000, NULL, NULL),
(213, 'Loa Âm Thanh Soundbar Trust GXT618 ASTO - Hàng Chính Hãng', 11, 1, 639, 10, '213', 1500000, NULL, NULL),
(214, 'Loa SoundBar Bluetooth Edifier B7', 11, 1, 10, 10, '214', 1500000, NULL, NULL),
(215, 'Loa JBL SB400/230', 11, 1, 14, 10, '215', 1500000, NULL, NULL),
(216, 'Loa Bluetooth Suntek Soudbar Box S8 - Hàng Chính Hãng', 11, 1, 899, 10, '216', 1500000, NULL, NULL),
(217, 'Loa Wireless KEF LS50 - Hàng Chính Hãng', 11, 1, 39, 10, '217', 1500000, NULL, NULL),
(218, 'Loa Sound BlasterX Katana 7.1 - Hàng Chính Hãng', 11, 1, 7, 10, '218', 1500000, NULL, NULL),
(219, 'Loa Di Động Edifier MP250 Plus', 11, 1, 1, 10, '219', 1500000, NULL, NULL),
(220, 'Loa Tangent Audio Fjord CD-FM-dock by Jacob - TFJORDCDFM', 11, 1, 11, 10, '220', 1500000, NULL, NULL),
(221, 'Loa Wireless KEF X300A - Hàng Chính Hãng', 11, 1, 15, 10, '221', 1500000, NULL, NULL),
(222, 'Máy Ghi Âm Sony ICD-UX560F', 12, 1, 2, 10, '222', 1500000, NULL, NULL),
(223, 'Máy Ghi Âm Stereo Ruizu K15 8GB (Đen) - Hàng Chính Hãng', 12, 1, 450, 10, '223', 1500000, NULL, NULL),
(224, 'Máy Ghi Âm HD Recorder Ruizu X01 8GB (Bạc) - Hàng Chính Hãng', 12, 1, 750, 10, '224', 1500000, NULL, NULL),
(225, 'Máy Ghi Âm HD Recorder Ruizu K10 8GB (Trắng) - Hàng Chính Hãng', 12, 1, 650, 10, '225', 1500000, NULL, NULL),
(226, 'Máy Lên Dây Đập Nhịp Ghi Âm Cherub Recording Metro-Tuner WMT-250', 12, 1, 900, 10, '226', 1500000, NULL, NULL),
(227, 'Máy Nghe Nhạc MP3 Ruizu X02 8GB - Hàng Chính Hãng', 13, 1, 480, 10, '227', 1500000, NULL, NULL),
(228, 'Máy Nghe Nhạc Transcend TS8GMP350B', 13, 1, 1, 10, '228', 1500000, NULL, NULL),
(229, 'Micro Thu Âm TS-99', 14, 1, 650, 10, '229', 1500000, NULL, NULL),
(230, 'Micro Karaoke Kèm Loa Bluetooth SD10 Sotate - Hàng Nhập Khẩu', 14, 1, 8, 10, '230', 1500000, NULL, NULL),
(231, 'Micro Không Dây Gunners GM-2838', 14, 1, 2, 10, '231', 1500000, NULL, NULL),
(232, 'Micro Kèm Loa Bluetooth Karaoke Sotate Q7 - Hàng Nhập Khẩu', 14, 1, 599, 10, '232', 1500000, NULL, NULL),
(233, 'Máy Cassette Toshiba TY-CWU11', 15, 1, 1, 10, '233', 1500000, NULL, NULL),
(234, 'Máy Cassette Toshiba TY-HRU30', 15, 1, 690, 10, '234', 1500000, NULL, NULL),
(235, 'Máy Cassette Toshiba TY-CRU12', 15, 1, 1, 10, '235', 1500000, NULL, NULL),
(236, 'Máy Cassette TEAC SL-D930 - Đỏ', 15, 1, 5, 10, '236', 1500000, NULL, NULL),
(237, 'Máy Cassette TEAC SL-D930 - Đen', 15, 1, 5, 10, '237', 1500000, NULL, NULL),
(238, 'Điện Thoại Nokia 105 Dual Sim (2017) - Hàng Chính Hãng', 16, 1, 490, 10, '238', 1500000, NULL, NULL),
(239, 'Điện Thoại Itel IT2120 - Hàng Chính Hãng', 16, 1, 199, 10, '239', 1500000, NULL, NULL),
(240, 'Điện Thoại Philips E103 - Hàng Chính Hãng', 16, 1, 320, 10, '240', 1500000, NULL, NULL),
(241, 'Điện Thoại Zono N260 (2018) - Hàng Nhập Khẩu', 16, 1, 399, 10, '241', 1500000, NULL, NULL),
(242, 'Điện thoại Nokia 3310 Dual Sim - Hàng Chính Hãng', 16, 1, 1, 10, '242', 1500000, NULL, NULL),
(243, 'Điện Thoại Nokia 216 - Hàng Chính Hãng', 16, 1, 820, 10, '243', 1500000, NULL, NULL),
(244, 'Điện Thoại Di Động GSM MAXX N3310 – Hàng Nhập Khẩu', 16, 1, 269, 10, '244', 1500000, NULL, NULL),
(245, 'Điện Thoại Nokia 130 2017 - Hàng Chính Hãng Điện Thoại Nokia 130 2017 - Hàng Chính Hãng', 16, 1, 520, 10, '245', 1500000, NULL, NULL),
(246, 'Điện Thoại Nokia 150 Dual Sim - Hàng Chính Hãng', 16, 1, 719, 10, '246', 1500000, NULL, NULL),
(247, 'Điện Thoại Philips E105 - Hàng Chính Hãng', 16, 1, 320, 10, '247', 1500000, NULL, NULL),
(248, 'Điện Thoại Philips E181 - Hàng Chính Hãng', 16, 1, 790, 10, '248', 1500000, NULL, NULL),
(249, 'Điện Thoại Cho Người Cao Tuổi Goly A1', 16, 1, 599, 10, '249', 1500000, NULL, NULL),
(250, 'Điện Thoại Masstel Spinner - Hãng Chính Hãng', 16, 1, 500, 10, '250', 1500000, NULL, NULL),
(251, 'Điện Thoại Itel 2180 - Hàng Chính Hãng', 16, 1, 290, 10, '251', 1500000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sheet1`
--

CREATE TABLE `sheet1` (
  `ID` int(2) DEFAULT NULL,
  `Name` varchar(22) DEFAULT NULL,
  `Mô tả` varchar(73) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sheet1`
--

INSERT INTO `sheet1` (`ID`, `Name`, `Mô tả`) VALUES
(1, 'Tivi', 'Bao gồm các loại tivi'),
(2, 'Thiết bị âm thanh', 'Loa và tai nghe…'),
(3, 'Điện thoại', 'Điện thoại'),
(4, 'Máy tính bảng', 'Máy tính bảng'),
(5, 'Máy ảnh - Quay phim', 'Máy ảnh - Quay phim'),
(6, 'Laptop', 'Laptop - Máy tính xách tay - Máy tính cá nhân'),
(7, 'Linh kiện máy tính', 'Linh kiện cho máy tính desktop và máy laptop, cũng như các hệ máy vi tính'),
(8, 'Phụ kiện di động', 'Phụ kiện dành cho điện thoại, smart phone'),
(9, 'Thiết bị đeo công nghệ', 'Các thiết bị đeo trên tay, đeo trên mặt như kính, đồng hồ,..'),
(10, 'Thiết bị lưu trữ', 'Các thiết bị lưu trữ trong, ngoài, di động'),
(11, 'Thiết bị mạng', 'Thiết bị dùng thiết lập mạng hay liên quan đến đường mạng'),
(12, 'Thiết bị số', 'Các thiết bị tần số radio,…'),
(1, 'Tivi', 'Bao gồm các loại tivi'),
(2, 'Thiết bị âm thanh', 'Loa và tai nghe…'),
(3, 'Điện thoại', 'Điện thoại'),
(4, 'Máy tính bảng', 'Máy tính bảng'),
(5, 'Máy ảnh - Quay phim', 'Máy ảnh - Quay phim'),
(6, 'Laptop', 'Laptop - Máy tính xách tay - Máy tính cá nhân'),
(7, 'Linh kiện máy tính', 'Linh kiện cho máy tính desktop và máy laptop, cũng như các hệ máy vi tính'),
(8, 'Phụ kiện di động', 'Phụ kiện dành cho điện thoại, smart phone'),
(9, 'Thiết bị đeo công nghệ', 'Các thiết bị đeo trên tay, đeo trên mặt như kính, đồng hồ,..'),
(10, 'Thiết bị lưu trữ', 'Các thiết bị lưu trữ trong, ngoài, di động'),
(11, 'Thiết bị mạng', 'Thiết bị dùng thiết lập mạng hay liên quan đến đường mạng'),
(12, 'Thiết bị số', 'Các thiết bị tần số radio,…'),
(1, 'Tivi', 'Bao gồm các loại tivi'),
(2, 'Thiết bị âm thanh', 'Loa và tai nghe…'),
(3, 'Điện thoại', 'Điện thoại'),
(4, 'Máy tính bảng', 'Máy tính bảng'),
(5, 'Máy ảnh - Quay phim', 'Máy ảnh - Quay phim'),
(6, 'Laptop', 'Laptop - Máy tính xách tay - Máy tính cá nhân'),
(7, 'Linh kiện máy tính', 'Linh kiện cho máy tính desktop và máy laptop, cũng như các hệ máy vi tính'),
(8, 'Phụ kiện di động', 'Phụ kiện dành cho điện thoại, smart phone'),
(9, 'Thiết bị đeo công nghệ', 'Các thiết bị đeo trên tay, đeo trên mặt như kính, đồng hồ,..'),
(10, 'Thiết bị lưu trữ', 'Các thiết bị lưu trữ trong, ngoài, di động'),
(11, 'Thiết bị mạng', 'Thiết bị dùng thiết lập mạng hay liên quan đến đường mạng'),
(12, 'Thiết bị số', 'Các thiết bị tần số radio,…');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `IDUser` int(11) NOT NULL,
  `EmailDN` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `TenHienThi` varchar(50) NOT NULL,
  `Hinh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhpho`
--

CREATE TABLE `thanhpho` (
  `IDThanhPho` int(11) NOT NULL,
  `TenThanhPho` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`IDChucVu`);

--
-- Chỉ mục cho bảng `chungloai`
--
ALTER TABLE `chungloai`
  ADD PRIMARY KEY (`IDChungLoai`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`IDHoaDon`,`IDSanPham`),
  ADD KEY `IDSanPham` (`IDSanPham`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`IDHoaDon`),
  ADD KEY `IDKhachHang` (`IDKhachHang`,`IDNVGiaoHang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`IDKhachHang`),
  ADD KEY `IDUser` (`IDUser`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`IDLoai`),
  ADD KEY `IDLoai` (`IDLoai`),
  ADD KEY `IDChungLoai` (`IDChungLoai`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`IDNhaCungCap`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDNhanVien`),
  ADD KEY `IDChucVu` (`IDChucVu`);

--
-- Chỉ mục cho bảng `phuong_xa`
--
ALTER TABLE `phuong_xa`
  ADD PRIMARY KEY (`IDPhuong_Xa`),
  ADD KEY `IDQuan_Huyen` (`IDQuan_Huyen`);

--
-- Chỉ mục cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD PRIMARY KEY (`IDQuan_Huyen`),
  ADD KEY `IDThanhPho` (`IDThanhPho`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`IDSanPham`),
  ADD KEY `IDSanPham` (`IDSanPham`),
  ADD KEY `IDNhaCungCap` (`IDNhaCungCap`),
  ADD KEY `IDLoai` (`IDLoai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`IDUser`);

--
-- Chỉ mục cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  ADD PRIMARY KEY (`IDThanhPho`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `IDChucVu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chungloai`
--
ALTER TABLE `chungloai`
  MODIFY `IDChungLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `IDKhachHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `IDLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `IDNhaCungCap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `IDNhanVien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phuong_xa`
--
ALTER TABLE `phuong_xa`
  MODIFY `IDPhuong_Xa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  MODIFY `IDQuan_Huyen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `IDSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  MODIFY `IDThanhPho` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`),
  ADD CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`IDHoaDon`) REFERENCES `hoadon` (`IDHoaDon`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `taikhoan` (`IDUser`);

--
-- Các ràng buộc cho bảng `loai`
--
ALTER TABLE `loai`
  ADD CONSTRAINT `loai_ibfk_1` FOREIGN KEY (`IDChungLoai`) REFERENCES `chungloai` (`IDChungLoai`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`IDChucVu`) REFERENCES `chucvu` (`IDChucVu`);

--
-- Các ràng buộc cho bảng `phuong_xa`
--
ALTER TABLE `phuong_xa`
  ADD CONSTRAINT `phuong_xa_ibfk_1` FOREIGN KEY (`IDQuan_Huyen`) REFERENCES `quan_huyen` (`IDQuan_Huyen`);

--
-- Các ràng buộc cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD CONSTRAINT `quan_huyen_ibfk_1` FOREIGN KEY (`IDThanhPho`) REFERENCES `thanhpho` (`IDThanhPho`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IDLoai`) REFERENCES `loai` (`IDLoai`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`IDNhaCungCap`) REFERENCES `nhacungcap` (`IDNhaCungCap`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
