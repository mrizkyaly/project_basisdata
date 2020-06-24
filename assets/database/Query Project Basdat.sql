-->Create TABLESPACE
CREATE TABLESPACE basdat
datafile 'D:\Document\basdat.dbf'
size 30M;

-->create USER
CREATE USER aly
IDENTIFIED BY aly
DEFAULT TABLESPACE basdat
QUOTA 30M ON basdat;

-->Table users
create table users
(
	id_user integer not null,
	username varchar2(32),
	password varchar2(64)
);

alter table users
add constraint pk_id_user primary key (id_user)

create sequence id_user
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;

create or replace trigger user_on_insert
before insert on users
for each row
begin
select id_user.nextval
into :new.id_user
from dual;
end;
/

-->Table Jenis
create table jenis
(
	id_jenis integer not null,
	nama_jenis varchar2(255)
);

alter table jenis
add constraint pk_id_jenis primary key (id_jenis)

create sequence id_jenis
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;

create or replace trigger jenis_on_insert
before insert on jenis
for each row
begin
select id_jenis.nextval
into :new.id_jenis
from dual;
end;
/


-->Table Produk
create table produk
(
	id_produk integer not null,
	id_user integer,
	id_jenis integer,
	nama_produk varchar2(255),
	gambar varchar2(255),
	ukuran varchar2(255),
	harga integer
);

alter table produk
add constraint pk_id_produk primary key (id_produk)
add constraint fk_id_user foreign key (id_user) references users(id_user)
add constraint fk_id_jenis foreign key (id_jenis) references jenis(id_jenis);

create sequence id_produk
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;

create or replace trigger produk_on_insert
before insert on produk
for each row
begin
select id_produk.nextval
into :new.id_produk
from dual;
end;
/

-->Table Pelanggan
create table pelanggan
(
	id_pelanggan integer not null,
	nama_pelanggan varchar2(255),
	nomor integer,
	alamat varchar2(255),
	username varchar2(32),
	password varchar2(64)
);

alter table pelanggan
add constraint pk_id_pelanggan primary key (id_pelanggan);

create sequence id_pelanggan
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;


create or replace trigger pelanggan_on_insert
before insert on pelanggan
for each row
begin
select id_pelanggan.nextval
into :new.id_pelanggan
from dual;
end;
/

-->Table Transaksi
create table transaksi
(
	id_transaksi integer not null,
	id_produk integer,
	id_pelanggan integer,
	bayar float(12),
	tgl_transaksi datetime
);

alter table produk
add constraint pk_id_transaksi primary key (id_transaksi)
add constraint fk_id_produk foreign key (id_produk) references users(id_produk)
add constraint fk_id_pelanggan foreign key (id_pelanggan) references jenis(id_pelanggan);

create sequence id_transaksi
minvalue 1
maxvalue 9999
start with 1
increment by 1
cache 20;


create or replace trigger transaksi_on_insert
before insert on transaksi
for each row
begin
select id_transaksi.nextval
into :new.id_transaksi
from dual;
end;
/