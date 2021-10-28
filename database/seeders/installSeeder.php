<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class installSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coso')->insert([
            ['name'=>'Cơ sở 1','diachi'=> 'Công viên phần mềm, Toà nhà Innovation lô 24, Quang Trung, Quận 12, Thành phố Hồ Chí Minh', 'tinh'=>'4', 'quan'=>'43', 'huyen'=>'1343']
        ]);

        DB::table('danhmuc')->insert([
            ['id' => 1, 'name'=>'Chăm sóc da mặt', 'slug'=> Str::slug('Chăm sóc da mặt', '-'), 'loai'=>'1'],
            ['id' => 2, 'name'=>'Điều trị mụn, sẹo', 'slug'=> Str::slug('Điều trị mụn, sẹo', '-'), 'loai'=>'1'],
            ['id' => 3, 'name'=>'Dịch vụ trị nám, tàn nhang', 'slug'=> Str::slug('Dịch vụ trị nám', '-'), 'loai'=>'1'],
            ['id' => 4, 'name'=>'Làm trẻ hóa da', 'slug'=> Str::slug('Làm trẻ hóa da', '-'), 'loai'=>'1'],
            ['id' => 5, 'name'=>'Dịch vụ massage', 'slug'=> Str::slug('Dịch vụ massage', '-'), 'loai'=>'1'],
            ['id' => 6, 'name'=>'Dịch vụ giảm béo', 'slug'=> Str::slug('Dịch vụ giảm béo', '-'), 'loai'=>'1'],
            ['id' => 7, 'name'=>'Làm đẹp', 'slug'=> Str::slug('Làm đẹp', '-'), 'loai'=>'2'],
            ['id' => 8, 'name'=>'Trắng da', 'slug'=> Str::slug('Trắng da', '-'), 'loai'=>'3'],
        ]);

        DB::table('dichvu')->insert([
            ['name'=>'Làm đẹp', 'slug'=>'lam-dep', 'img'=>'lamdep.jpg', 'giamgia'=> 1, 'iddm'=> 1, 'motangan'=>'Lam dep - Những phương pháp làm đẹp da, tóc đẹp, cải thiện vóc dáng hiệu quả và đơn giản. Chia sẻ về cách chọn mỹ phẩm, trang điểm, trị mụn', 'dongia'=>200000, 'noidung'=>'Có phải bạn sẽ cười tươi hơn, tự tin ngẩn cao đầu khi có ai đó khen bạn: "Trông bạn thật xinh đẹp!". Hãy chân thật với chính mình, bạn thật sự muốn mình xinh đẹp để tự tin gặp gỡ bất kỳ ai và cuốn hút họ ngay cái nhìn đầu tiên, hay bạn muốn mình cứ xuề xòa, luộm thuộm để mong chờ người khác thấy vẻ đẹp tâm hồn bên trong con người bạn? ', 'trangthai'=> 1],
            ['name'=>'Trị mụn y khoa', 'slug'=> Str::slug('Trị mụn y khoa', '-'), 'img'=>'lamdep.jpg', 'giamgia'=> 0, 'iddm'=> 2, 'motangan' => '', 'dongia' => 200000, 'noidung' => '', 'trangthai' => 1]
        ]);

        DB::table('nhanvien')->insert([
            ['idcoso'=>1,'iddichvu'=>1, 'email'=>'ngoanhquoc@gmail.com','password'=> '$2y$10$iimuFe7voEEthMTFQvRBX.hk1XrL3O1W7lXTZPCxktAIWkuEmY692','role'=>1 ,'active'=>1 ,'name'=>'Ngô Anh Quốc', 'img'=>'', 'namsinh'=> 2000,'gioitinh'=> 1, 'sdt'=> '012345678', 'avatar'=>'quoc.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['idcoso'=>1,'iddichvu'=>1, 'email'=>'longnh.2401@gmail.com','password'=> bcrypt('123123123'),'role'=>1 ,'active'=>1 ,'name'=>'Long', 'img'=>'', 'namsinh'=> 2000,'gioitinh'=> 1, 'sdt'=> '012345678', 'avatar'=>'quoc.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['idcoso'=>1,'iddichvu'=>1, 'email'=>'tuong2712@gmail.com','password'=> '$2y$10$nlRY7DRJfQQLSbI0aV7h9usw0waQxL9uGbNFQChi.06.YIigQCC3q','role'=>1 ,'active'=>1 ,'name'=>'Tưởng', 'img'=>'', 'namsinh'=> 2000,'gioitinh'=> 1, 'sdt'=> '012345678', 'avatar'=>'quoc.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['idcoso'=>1,'iddichvu'=>1, 'email'=>'nhanvien@gmail.com','password'=> bcrypt('123123123'),'role'=>1 ,'active'=>1 ,'name'=>'nhân viên', 'img'=>'', 'namsinh'=> 2000,'gioitinh'=> 1, 'sdt'=> '012345678', 'avatar'=>'quoc.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['idcoso'=>1,'iddichvu'=>1, 'email'=>'tranquangnhan1606@gmail.com','password'=> '$2y$10$Pmr.7sQX/HnGhwq8ZzlOPuZ9P.yBZ1XSxoRINN4arsLVGR6.6lxf6','role'=>1 ,'active'=>1 ,'name'=>'Nhân', 'img'=>'', 'namsinh'=> 2000,'gioitinh'=> 1, 'sdt'=> '012345678', 'avatar'=>'quoc.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['idcoso'=>1,'iddichvu'=>1, 'email'=>'thuhuyendev01@gmail.com','password'=> '$2y$10$Pmr.7sQX/HnGhwq8ZzlOPuZ9P.yBZ1XSxoRINN4arsLVGR6.6lxf6','role'=>1 ,'active'=>1 ,'name'=>'Thu Huyền', 'img'=>'huyen.jpg', 'namsinh'=> 2001,'gioitinh'=> 0, 'sdt'=> '012345678', 'avatar'=>'huyen.jpg','trangthai'=> 1,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-10-03 20:56:18','updated_at'=> NULL],
        ]);
        DB::table('giamgia')->insert([
            ['name'=>'MAXSALE150','ma'=>'FB01', 'number'=>25000,'max'=> 150000,'loai'=>1 ,'ngaytao'=>'10252021' ,'ngayhethan'=>'10252029','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['name'=>'MAXSALE250','ma'=>'FB02', 'number'=>250000,'max'=> 950000,'loai'=>0 ,'ngaytao'=>'10252021' ,'ngayhethan'=>'10252029','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['name'=>'MAXSALE200','ma'=>'FB03', 'number'=>150000,'max'=> 200000,'loai'=>1 ,'ngaytao'=>'10252021' ,'ngayhethan'=>'10252029','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
        ]);




    }
}
