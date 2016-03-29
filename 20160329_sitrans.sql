--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.1
-- Dumped by pg_dump version 9.5.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: customer; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE customer (
    idcustomer integer NOT NULL,
    namacustomer character varying(50),
    telponcustomer character varying(50),
    alamatcustomer character varying(50)
);


ALTER TABLE customer OWNER TO postgres;

--
-- Name: jenis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE jenis (
    idjenis integer NOT NULL,
    namajenis character varying(50),
    rop integer,
    stok_kilo numeric,
    stok_karton numeric
);


ALTER TABLE jenis OWNER TO postgres;

--
-- Name: merk; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE merk (
    idmerk integer NOT NULL,
    idsupplier integer NOT NULL,
    namasupplier character varying(50),
    status character varying(25)
);


ALTER TABLE merk OWNER TO postgres;

--
-- Name: pembayaran_in; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pembayaran_in (
    idbayar integer NOT NULL,
    customer character varying(50),
    tgl_trans date,
    tgl_bayar date,
    jumlahbayar numeric,
    status_bayar character varying(25)
);


ALTER TABLE pembayaran_in OWNER TO postgres;

--
-- Name: pembayaran_out; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pembayaran_out (
    idbayar integer NOT NULL,
    supplier character varying(50),
    tgl_trans date,
    tgl_bayar date,
    jumlahbayar numeric,
    status_bayar character varying(25)
);


ALTER TABLE pembayaran_out OWNER TO postgres;

--
-- Name: pembelian; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pembelian (
    idbeli integer NOT NULL,
    idbayar integer,
    produk character varying(50),
    tgl_beli date,
    tgl_terima date,
    cara_terima character varying(25),
    cara_bayar character varying(25),
    status_del character varying(25),
    harga_total numeric,
    karton numeric,
    kilo numeric
);


ALTER TABLE pembelian OWNER TO postgres;

--
-- Name: pengguna; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pengguna (
    username character varying(25) NOT NULL,
    nama character varying(50),
    password character varying(25),
    role character varying(25)
);


ALTER TABLE pengguna OWNER TO postgres;

--
-- Name: penjualan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE penjualan (
    idjual integer NOT NULL,
    idbayar integer,
    produk character varying(50),
    tgl_jual date,
    tgl_kirim date,
    jatuh_tempo date,
    jam_kirim time without time zone,
    cara_kirim character varying(25),
    cara_bayar character varying(25),
    status_del character varying(25),
    harga_total numeric,
    karton numeric,
    kilo numeric
);


ALTER TABLE penjualan OWNER TO postgres;

--
-- Name: produk; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE produk (
    idmerk integer NOT NULL,
    idsupplier integer NOT NULL,
    idjenis integer NOT NULL,
    lokasi character varying(25) NOT NULL,
    namaproduk character varying(50),
    harga_beli integer,
    harga_jual integer,
    kilo numeric,
    karton numeric
);


ALTER TABLE produk OWNER TO postgres;

--
-- Name: supplier; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE supplier (
    idsupplier integer NOT NULL,
    namasupplier character varying(50),
    telponsupplier character varying(50),
    alamatsupplier character varying(100),
    no_rekening character varying(50)
);


ALTER TABLE supplier OWNER TO postgres;

--
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY customer (idcustomer, namacustomer, telponcustomer, alamatcustomer) FROM stdin;
1000000001	Lotte Mart	+6221123456	Jl. Rajawali  02, Jakarta Timur
1000000002	Hotel Santika	+6221123457	Perum Gandasari 05, Jakarta Selatan
1000000003	Hotel Bumiwiyata	+6221123458	Mares Margonda, Depok
1000000004	Resto McDonald	+6221123459	Pondok Pepaya Asri, Depok
1000000005	Resto KFC	+6221123451	Jl. Jatiasih, Bekasi
1000000006	Resto AW	+6221123452	Pondok Cabe, Tangerang Selatan
1000000007	Modena Resto	+6221123453	Jl. Kenanga Raya, Bekasi
1000000008	Delicia Hotel	+6221123454	Jl. Arjuna No. 20, Jakarta Utara
1000000009	Burger King	+6221123455	Jl. Bulog Rante, Jakarta Timur
1000000010	Hollycow	+6221123450	Jl. Kapten P. Tendean, Jakarta Pusat 
\.


--
-- Data for Name: jenis; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY jenis (idjenis, namajenis, rop, stok_kilo, stok_karton) FROM stdin;
400000001	Sirloin	150	650	270
400000002	Hati	0	0	0
400000003	Knuckle	100	500	450
400000004	Striploin	60	350	300
400000005	Cubroll	90	700	200
400000006	Chuck	130	450	200
400000007	Shank	200	900	400
400000008	Oxtail	130	300	300
400000009	Rib eye	80	450	300
400000010	Shorttrib	150	600	170
\.


--
-- Data for Name: merk; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY merk (idmerk, idsupplier, namasupplier, status) FROM stdin;
300000001	2000000001	Affco	aktif
300000002	2000000010	Moonbeef	aktif
300000003	2000000002	Teys	aktif
300000004	2000000003	G.Lea	aktif
300000005	2000000004	Riverland	aktif
300000006	2000000005	Raplh	aktif
300000007	2000000006	Alliance	aktif
300000008	2000000007	Hantervaley	aktif
300000009	2000000008	Harvey	aktif
300000010	2000000009	Hill Top	aktif
\.


--
-- Data for Name: pembayaran_in; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pembayaran_in (idbayar, customer, tgl_trans, tgl_bayar, jumlahbayar, status_bayar) FROM stdin;
\.


--
-- Data for Name: pembayaran_out; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pembayaran_out (idbayar, supplier, tgl_trans, tgl_bayar, jumlahbayar, status_bayar) FROM stdin;
\.


--
-- Data for Name: pembelian; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pembelian (idbeli, idbayar, produk, tgl_beli, tgl_terima, cara_terima, cara_bayar, status_del, harga_total, karton, kilo) FROM stdin;
\.


--
-- Data for Name: pengguna; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pengguna (username, nama, password, role) FROM stdin;
purchasing01	Winny Claudia	123456	purchasing
purchasing02	Dahru Dzahaban	123456	purchasing
purchasing03	Andre Valerian	123456	purchasing
sm01	Akram Amrullah	123456	sales marketing
sm02	Gita Venesia	123456	sales marketing
inventori01	Fathahillah	123456	admin inventori
inventori02	Basuki Rahmat	123456	admin inventori
finance01	Binti Nur	123456	finance
finance02	Fauziah Raihani	123456	finance
bod01	Insyal Ka Abdul Rajab	123456	bod
bod02	Endah Pranolowati	123456	bod
bod03	Fadil Mahdi	123456	bod
admin	Sularjo Giantoro	654321	admin
\.


--
-- Data for Name: penjualan; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY penjualan (idjual, idbayar, produk, tgl_jual, tgl_kirim, jatuh_tempo, jam_kirim, cara_kirim, cara_bayar, status_del, harga_total, karton, kilo) FROM stdin;
\.


--
-- Data for Name: produk; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY produk (idmerk, idsupplier, idjenis, lokasi, namaproduk, harga_beli, harga_jual, kilo, karton) FROM stdin;
300000001	2000000001	400000001	cakung	Sirloin Affco	120000	135000	100	50
300000002	2000000010	400000001	cakung	Sirloin Moonbeef	110000	130000	200	120
300000003	2000000002	400000004	cakung	Striploin Teys	115000	125000	150	200
300000004	2000000003	400000003	cakung	Knuckle G.Lea	150000	160000	200	200
300000005	2000000004	400000005	cakung	Cubroll Riverland	95000	115000	300	150
300000006	2000000005	400000006	cakung	Chuck Raplh	130000	145000	200	100
300000007	2000000006	400000007	cakung	Shank Alliance	200000	220000	300	50
300000008	2000000007	400000008	bekasi	Oxtail Hantervaley	90000	105000	200	200
300000009	2000000008	400000009	bekasi	Rib eye Harvey	150000	165000	250	150
300000010	2000000009	400000010	bekasi	Shorttrib Hill Top	145000	165000	300	120
300000001	2000000001	400000004	bekasi	Striploin Affco	180000	200000	200	100
300000003	2000000002	400000001	bekasi	Sirloin Teys	100000	120000	350	100
300000003	2000000002	400000007	bekasi	Shank Teys	160000	175000	300	200
300000005	2000000004	400000003	bekasi	Knuckle Riverland	120000	140000	300	250
300000008	2000000007	400000005	bekasi	Cubroll Hantervaley	200000	230000	400	50
300000007	2000000006	400000006	cakung	Chuck Alliance	135000	150000	250	100
300000008	2000000007	400000007	cakung	Shank Hantervaley	120000	145000	300	150
300000004	2000000003	400000008	bekasi	Oxtail G.Lea	100000	115000	100	100
300000010	2000000009	400000009	bekasi	Rib eye Hill Top	140000	155000	200	150
300000002	2000000010	400000010	bekasi	Shorttrib Moonbeef	95000	105000	300	50
\.


--
-- Data for Name: supplier; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY supplier (idsupplier, namasupplier, telponsupplier, alamatsupplier, no_rekening) FROM stdin;
2000000001	PT. Indoguna	+6231123456	Jl. Kapten P. Tendean, Jakarta Pusat	\N
2000000002	PT. Bina Mentari Tunggal	+6231123457	Pondok Cabe, Tangerang Selatan	\N
2000000003	PT. Agro Giri Perkasa	+6231123458	Mares Margonda, Depok	\N
2000000004	Tanjung Unggul Mandiri	+6231123459	Perum Gandasari 05, Jakarta Selatan	\N
2000000005	PT. Andini Karya Makmur	+6231123451	Perum Asri Sari 06, Jakarta Barat	\N
2000000006	Agri Satwa Kencana	+6231123452	Jl. Rajawali  02, Jakarta Timur	\N
2000000007	PT. Pasir Tengah	+6231123453	Jl. Kenanga Raya, Bekasi	\N
2000000008	Widodo Makmur	+6231123454	Jl. Bulog Rante, Jakarta Timur	\N
2000000009	PT. Lembu Perkasa	+6231123455	Pondok Pepaya Asri, Depok	\N
2000000010	Jaya Sentosa	+6231123450	Jl. Jatiasih, Bekasi	\N
\.


--
-- Name: customer_namacustomer_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY customer
    ADD CONSTRAINT customer_namacustomer_key UNIQUE (namacustomer);


--
-- Name: customer_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (idcustomer);


--
-- Name: jenis_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY jenis
    ADD CONSTRAINT jenis_pkey PRIMARY KEY (idjenis);


--
-- Name: merk_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY merk
    ADD CONSTRAINT merk_pkey PRIMARY KEY (idmerk, idsupplier);


--
-- Name: pembayaran_in_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pembayaran_in
    ADD CONSTRAINT pembayaran_in_pkey PRIMARY KEY (idbayar);


--
-- Name: pembayaran_out_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pembayaran_out
    ADD CONSTRAINT pembayaran_out_pkey PRIMARY KEY (idbayar);


--
-- Name: pembelian_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pembelian
    ADD CONSTRAINT pembelian_pkey PRIMARY KEY (idbeli);


--
-- Name: pengguna_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pengguna
    ADD CONSTRAINT pengguna_pkey PRIMARY KEY (username);


--
-- Name: penjualan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY penjualan
    ADD CONSTRAINT penjualan_pkey PRIMARY KEY (idjual);


--
-- Name: produk_namaproduk_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produk
    ADD CONSTRAINT produk_namaproduk_key UNIQUE (namaproduk);


--
-- Name: produk_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produk
    ADD CONSTRAINT produk_pkey PRIMARY KEY (idmerk, idsupplier, idjenis, lokasi);


--
-- Name: supplier_namasupplier_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY supplier
    ADD CONSTRAINT supplier_namasupplier_key UNIQUE (namasupplier);


--
-- Name: supplier_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY supplier
    ADD CONSTRAINT supplier_pkey PRIMARY KEY (idsupplier);


--
-- Name: merk_idsupplier_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY merk
    ADD CONSTRAINT merk_idsupplier_fkey FOREIGN KEY (idsupplier) REFERENCES supplier(idsupplier);


--
-- Name: pembayaran_in_customer_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pembayaran_in
    ADD CONSTRAINT pembayaran_in_customer_fkey FOREIGN KEY (customer) REFERENCES customer(namacustomer) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pembayaran_out_supplier_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pembayaran_out
    ADD CONSTRAINT pembayaran_out_supplier_fkey FOREIGN KEY (supplier) REFERENCES supplier(namasupplier) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pembelian_idbayar_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pembelian
    ADD CONSTRAINT pembelian_idbayar_fkey FOREIGN KEY (idbayar) REFERENCES pembayaran_out(idbayar) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pembelian_produk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pembelian
    ADD CONSTRAINT pembelian_produk_fkey FOREIGN KEY (produk) REFERENCES produk(namaproduk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: penjualan_idbayar_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY penjualan
    ADD CONSTRAINT penjualan_idbayar_fkey FOREIGN KEY (idbayar) REFERENCES pembayaran_in(idbayar) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: penjualan_produk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY penjualan
    ADD CONSTRAINT penjualan_produk_fkey FOREIGN KEY (produk) REFERENCES produk(namaproduk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: produk_idjenis_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produk
    ADD CONSTRAINT produk_idjenis_fkey FOREIGN KEY (idjenis) REFERENCES jenis(idjenis) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: produk_idmerk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produk
    ADD CONSTRAINT produk_idmerk_fkey FOREIGN KEY (idmerk, idsupplier) REFERENCES merk(idmerk, idsupplier) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

