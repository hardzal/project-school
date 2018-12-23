LKS Sekolah (Class Meeting) 14 - 15 Desember 2015

Tema "Blog Personal"

Latar Belakang
 Seorang guru yang sedang memiliki sebuah blog yang digunakan untuk menulis artikel dan berbagi ilmunya. blog tersebut digunakan untuk keperluan mengajar dan jadwal.


TO DO LIST
--------------------------------------------------------
FRONT END DESIGN (Estimasi Waktu : )

Sketch/Wireframe
Asset (Image, Icon, Font, Color)
Font: 'Open Sans'
Color Link : #2969b0

--------------------------------------------------------
FRONT END DEVELOP (Estimasi Waktu : )

index (homepage)
 header.php
 content.php
 section.php
 footer.php

login.php
register.php

page
 contact.php
 about.php
 sitemap.php
 bukutamu.php

article.php
category.php
search.php

admin.php
user.php
--------------------------------------------------------
BACK END DEVELOP (Estimasi Waktu : )

class.php 
 koneksi
 crud
 paginasi
 stats
  
Struktur Database : "lks_sekolah_2015"
 
 blog_user
 	id_username
 	username
 	password
 	email
 	level_user
 	status

 blog_userdetail
 	id_user
 	nama_lengkap
 	fb_link
 	tw_link
 	bio

 blog_artikel
	id_artikel
	judul_artikel
	username
	tgl_artikel
	id_kategori
	img_artikel
	isi_artikel

 blog_kategori
  	id_kategori
  	nama_kategori
  	keterangan

 blog_komentar
  	id_komentar
  	id_artikel
  	nama
  	email
  	url
  	komentar

 blog_bukutamu
  	id_post
  	nama
  	email
  	url
  	pesan

 blog_statistik
  	id_stats
 	ip
-------------------------------------------------------------------------------------
