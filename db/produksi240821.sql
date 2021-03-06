PGDMP     3    &                y            produksi    11.3    11.3 ?    3           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            4           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            5           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            6           1262    16393    produksi    DATABASE     ?   CREATE DATABASE produksi WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE produksi;
             postgres    false            ?            1259    65474    agent    TABLE     +  CREATE TABLE public.agent (
    id_agent bigint,
    nama character varying(255),
    telp character varying(50),
    alamat text,
    email character varying(200),
    status bigint,
    add_time timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    kode_referral character varying(100)
);
    DROP TABLE public.agent;
       public         postgres    false            ?            1259    65481    agent_ID_sequence    SEQUENCE     |   CREATE SEQUENCE public."agent_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public."agent_ID_sequence";
       public       postgres    false    246            7           0    0    agent_ID_sequence    SEQUENCE OWNED BY     J   ALTER SEQUENCE public."agent_ID_sequence" OWNED BY public.agent.id_agent;
            public       postgres    false    247            ?            1259    65462    anggota    TABLE     ?  CREATE TABLE public.anggota (
    id_anggota integer NOT NULL,
    pt character varying(30) NOT NULL,
    pic character varying(50),
    tlp integer,
    tgl date,
    jam character varying(50),
    bg character varying(50),
    file character varying(59),
    periode_bulan bigint,
    add_time timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    kode_refferal character varying(255)
);
    DROP TABLE public.anggota;
       public         postgres    false            ?            1259    65467    anggota_ID_sequence    SEQUENCE     ~   CREATE SEQUENCE public."anggota_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public."anggota_ID_sequence";
       public       postgres    false    244            8           0    0    anggota_ID_sequence    SEQUENCE OWNED BY     P   ALTER SEQUENCE public."anggota_ID_sequence" OWNED BY public.anggota.id_anggota;
            public       postgres    false    245            ?            1259    16394    asum_ID_sequence    SEQUENCE     {   CREATE SEQUENCE public."asum_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public."asum_ID_sequence";
       public       postgres    false            ?            1259    16436    asum    TABLE     ?  CREATE TABLE public.asum (
    id_asum bigint DEFAULT nextval('public."asum_ID_sequence"'::regclass) NOT NULL,
    tertanggung character varying(255),
    produk character varying(255),
    no_polis character varying(255),
    tgl_polis date,
    premi double precision,
    tgl_penagihan date,
    no_surat_penagihan character varying(255),
    komisi double precision,
    keterangan text,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.asum;
       public         postgres    false    196            ?            1259    16396    asuransi_ID_sequence    SEQUENCE        CREATE SEQUENCE public."asuransi_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public."asuransi_ID_sequence";
       public       postgres    false            ?            1259    16444    asuransi    TABLE     
  CREATE TABLE public.asuransi (
    id_asuransi bigint DEFAULT nextval('public."asuransi_ID_sequence"'::regclass) NOT NULL,
    nama_asuransi character varying(255),
    add_by bigint,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.asuransi;
       public         postgres    false    197            ?            1259    16398    bank_ID_sequence    SEQUENCE     {   CREATE SEQUENCE public."bank_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public."bank_ID_sequence";
       public       postgres    false            ?            1259    16449    bank    TABLE     ?   CREATE TABLE public.bank (
    id_bank bigint DEFAULT nextval('public."bank_ID_sequence"'::regclass) NOT NULL,
    nama_bank character varying(255),
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    add_by bigint
);
    DROP TABLE public.bank;
       public         postgres    false    198            ?            1259    16400    bank_garansi_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."bank_garansi_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."bank_garansi_ID_sequence";
       public       postgres    false            ?            1259    16454    bank_garansi    TABLE     1  CREATE TABLE public.bank_garansi (
    id_bg bigint DEFAULT nextval('public."bank_garansi_ID_sequence"'::regclass) NOT NULL,
    no_bg character varying(255),
    tgl_bg date,
    dokumen text,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    id_permohonan_bg bigint
);
     DROP TABLE public.bank_garansi;
       public         postgres    false    199            ?            1259    17585    bayar_komisi    TABLE     `  CREATE TABLE public.bayar_komisi (
    id_bayar_komisi bigint NOT NULL,
    komisi_dibayar double precision,
    tgl_bayar date,
    bukti_bayar character varying(255),
    id_permohonan bigint,
    add_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    add_by bigint,
    nomor_penagihan character varying(255),
    tgl_penagihan date
);
     DROP TABLE public.bayar_komisi;
       public         postgres    false            ?            1259    17590    bayar_komisi_seq    SEQUENCE     y   CREATE SEQUENCE public.bayar_komisi_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.bayar_komisi_seq;
       public       postgres    false    242            9           0    0    bayar_komisi_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.bayar_komisi_seq OWNED BY public.bayar_komisi.id_bayar_komisi;
            public       postgres    false    243            ?            1259    16402    cabang_asuransi_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."cabang_asuransi_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public."cabang_asuransi_ID_sequence";
       public       postgres    false            ?            1259    16462    cabang_asuransi    TABLE     ?  CREATE TABLE public.cabang_asuransi (
    id_cabang_asuransi bigint DEFAULT nextval('public."cabang_asuransi_ID_sequence"'::regclass) NOT NULL,
    id_asuransi bigint,
    nama_cabang character varying(255),
    alamat text,
    telepon character varying(255),
    email character varying(255),
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    add_by bigint
);
 #   DROP TABLE public.cabang_asuransi;
       public         postgres    false    200            ?            1259    16404    cabang_bank_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."cabang_bank_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public."cabang_bank_ID_sequence";
       public       postgres    false            ?            1259    16470    cabang_bank    TABLE     %  CREATE TABLE public.cabang_bank (
    id_cabang_bank bigint DEFAULT nextval('public."cabang_bank_ID_sequence"'::regclass) NOT NULL,
    id_bank bigint,
    cabang_bank character varying(255),
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    add_by bigint
);
    DROP TABLE public.cabang_bank;
       public         postgres    false    201            ?            1259    16406    cbc_ID_sequence    SEQUENCE     z   CREATE SEQUENCE public."cbc_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public."cbc_ID_sequence";
       public       postgres    false            ?            1259    16475    cbc    TABLE     X  CREATE TABLE public.cbc (
    id_cbc bigint DEFAULT nextval('public."cbc_ID_sequence"'::regclass) NOT NULL,
    surat_tagihan text,
    tgl_tagih_sm date,
    id_bank bigint,
    pembawa_bisnis character varying(255),
    principal character varying(255),
    no_surat_bank character varying(255),
    tgl_surat_bank date,
    nilai_pertanggungan double precision,
    nilai_premi double precision,
    potensi_komisi double precision,
    no_npp character varying(255),
    tgl_npp date,
    no_surat_tagih character varying(255),
    tgl_surat_tagih date,
    jumlah_tagih double precision,
    tgl_masuk_tagih date,
    ket text,
    bukti_bayar text,
    id_asuransi bigint,
    no_polis character varying(255),
    tgl_polis date,
    bb_premi text,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    add_by bigint
);
    DROP TABLE public.cbc;
       public         postgres    false    202            ?            1259    17574    dokumen    TABLE     =  CREATE TABLE public.dokumen (
    id_dokumen bigint,
    nama_dokumen character varying(255),
    jenis_dokumen character varying(255),
    id_permohonan_bg bigint,
    add_time timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    tgl_terbit date,
    dokumen character varying(255),
    id_transaksi bigint
);
    DROP TABLE public.dokumen;
       public         postgres    false            ?            1259    16408    dokumen_persyaratan_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."dokumen_persyaratan_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public."dokumen_persyaratan_ID_sequence";
       public       postgres    false            ?            1259    16483    dokumen_persyaratan    TABLE     ?  CREATE TABLE public.dokumen_persyaratan (
    id_dokumen_persyaratan bigint DEFAULT nextval('public."dokumen_persyaratan_ID_sequence"'::regclass) NOT NULL,
    id_permohonan_bg bigint,
    dokumen_persyaratan text,
    id_jenis_dokumen_persyaratan bigint,
    status_aktif bigint,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    add_by bigint,
    kelengkapan bigint,
    valid bigint,
    nomor_dokumen character varying(255),
    tgl_berakhir_dok date
);
 '   DROP TABLE public.dokumen_persyaratan;
       public         postgres    false    203            ?            1259    17582    dokumen_seq    SEQUENCE     t   CREATE SEQUENCE public.dokumen_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.dokumen_seq;
       public       postgres    false    240            :           0    0    dokumen_seq    SEQUENCE OWNED BY     F   ALTER SEQUENCE public.dokumen_seq OWNED BY public.dokumen.id_dokumen;
            public       postgres    false    241            ?            1259    16410    jenis_bg_ID_sequence    SEQUENCE        CREATE SEQUENCE public."jenis_bg_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public."jenis_bg_ID_sequence";
       public       postgres    false            ?            1259    16491    jenis_bg    TABLE       CREATE TABLE public.jenis_bg (
    id_jenis_bg bigint DEFAULT nextval('public."jenis_bg_ID_sequence"'::regclass) NOT NULL,
    jenis_bg character varying(255),
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    add_by bigint
);
    DROP TABLE public.jenis_bg;
       public         postgres    false    204            ?            1259    17569    jenis_dok_persyaratan    TABLE     ?   CREATE TABLE public.jenis_dok_persyaratan (
    id_jenis_dok_persyaratan bigint,
    jenis_dok_persyaratan character varying(255),
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP
);
 )   DROP TABLE public.jenis_dok_persyaratan;
       public         postgres    false            ?            1259    17567    jenis_dok_syarat_id_sequence    SEQUENCE     ?   CREATE SEQUENCE public.jenis_dok_syarat_id_sequence
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.jenis_dok_syarat_id_sequence;
       public       postgres    false    239            ;           0    0    jenis_dok_syarat_id_sequence    SEQUENCE OWNED BY     s   ALTER SEQUENCE public.jenis_dok_syarat_id_sequence OWNED BY public.jenis_dok_persyaratan.id_jenis_dok_persyaratan;
            public       postgres    false    238            ?            1259    16412    jenis_kredit_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."jenis_kredit_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."jenis_kredit_ID_sequence";
       public       postgres    false            ?            1259    16496    jenis_kredit    TABLE       CREATE TABLE public.jenis_kredit (
    id_jenis_kredit bigint DEFAULT nextval('public."jenis_kredit_ID_sequence"'::regclass) NOT NULL,
    jenis_kredit character varying(255),
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    add_by bigint
);
     DROP TABLE public.jenis_kredit;
       public         postgres    false    205            ?            1259    16414    kelengkapan_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."kelengkapan_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public."kelengkapan_ID_sequence";
       public       postgres    false            ?            1259    16501    kelengkapan_dokumen_penagihan    TABLE     ?  CREATE TABLE public.kelengkapan_dokumen_penagihan (
    id_kelengkapan bigint DEFAULT nextval('public."kelengkapan_ID_sequence"'::regclass) NOT NULL,
    id_permohonan bigint,
    dokumen_kelengkapan text,
    status bigint,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    add_by bigint,
    kelengkapan bigint,
    valid bigint,
    dokumen character varying(255)
);
 1   DROP TABLE public.kelengkapan_dokumen_penagihan;
       public         postgres    false    206            ?            1259    16416    legalitas_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."legalitas_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public."legalitas_ID_sequence";
       public       postgres    false            ?            1259    16509    legalitas_permohonan    TABLE     ?  CREATE TABLE public.legalitas_permohonan (
    id_legalitas bigint DEFAULT nextval('public."legalitas_ID_sequence"'::regclass) NOT NULL,
    id_permohonan_bg bigint,
    nama_notaris character varying(255),
    alamat_notaris text,
    no_ktp character varying(255),
    pengadilan character varying(255),
    alamat_pengadilan text,
    pasal character varying(255),
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    add_by bigint,
    status bigint
);
 (   DROP TABLE public.legalitas_permohonan;
       public         postgres    false    207            ?            1259    16418    level_ID_sequence    SEQUENCE     |   CREATE SEQUENCE public."level_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public."level_ID_sequence";
       public       postgres    false            ?            1259    16517    level    TABLE     ?   CREATE TABLE public.level (
    id_level bigint DEFAULT nextval('public."level_ID_sequence"'::regclass) NOT NULL,
    level character varying(255),
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.level;
       public         postgres    false    208            ?            1259    16420    pengantar_asuransi_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."pengantar_asuransi_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public."pengantar_asuransi_ID_sequence";
       public       postgres    false            ?            1259    16522    pengantar_asuransi    TABLE       CREATE TABLE public.pengantar_asuransi (
    id_pengantar_asuransi bigint DEFAULT nextval('public."pengantar_asuransi_ID_sequence"'::regclass) NOT NULL,
    id_permohonan_bg bigint,
    tgl_terbit date,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
 &   DROP TABLE public.pengantar_asuransi;
       public         postgres    false    209            ?            1259    16422    pengantar_bank_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."pengantar_bank_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."pengantar_bank_ID_sequence";
       public       postgres    false            ?            1259    16527    pengantar_bank    TABLE       CREATE TABLE public.pengantar_bank (
    id_pengantar_bank bigint DEFAULT nextval('public."pengantar_bank_ID_sequence"'::regclass) NOT NULL,
    id_permohonan_bg bigint,
    tgl_terbit date,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
 "   DROP TABLE public.pengantar_bank;
       public         postgres    false    210            ?            1259    16424    pengguna_ID_sequence    SEQUENCE        CREATE SEQUENCE public."pengguna_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public."pengguna_ID_sequence";
       public       postgres    false            ?            1259    16532    pengguna    TABLE     ?  CREATE TABLE public.pengguna (
    id_pengguna bigint DEFAULT nextval('public."pengguna_ID_sequence"'::regclass) NOT NULL,
    nama_lengkap character varying(255),
    nik character varying(255),
    alamat text,
    email character varying(255),
    id_level bigint,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    no_telp character varying(255),
    username character varying(255),
    password character varying(255)
);
    DROP TABLE public.pengguna;
       public         postgres    false    211            ?            1259    16426    permohonan_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."permohonan_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public."permohonan_ID_sequence";
       public       postgres    false            ?            1259    16540    permohonan_bank_garansi    TABLE     ?  CREATE TABLE public.permohonan_bank_garansi (
    id_permohonan bigint DEFAULT nextval('public."permohonan_ID_sequence"'::regclass) NOT NULL,
    nomor_registrasi character varying(255),
    nomor_surat_permohonan character varying(255),
    tgl_surat_permohonan date,
    no_surat_undangan character varying(255),
    tgl_surat_undangan date,
    id_cabang_asuransi bigint,
    nama_oblige character varying(255),
    alamat_oblige text,
    nama_pekerjaan character varying(255),
    nilai_kontrak double precision,
    nilai_jaminan double precision,
    id_status_permohonan bigint,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    tgl_registrasi date,
    id_principal bigint,
    id_bg bigint,
    id_cabang_bank bigint,
    id_jenis_bg bigint,
    jangka_waktu_awal date,
    jangka_waktu_akhir date,
    tgl_terbit_jaminan date,
    kode_referral character varying(255)
);
 +   DROP TABLE public.permohonan_bank_garansi;
       public         postgres    false    212            ?            1259    16428     persetujuan_asuransi_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."persetujuan_asuransi_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public."persetujuan_asuransi_ID_sequence";
       public       postgres    false            ?            1259    16548    persetujuan_asuransi    TABLE     ?  CREATE TABLE public.persetujuan_asuransi (
    id_persetujuan_asuransi bigint DEFAULT nextval('public."persetujuan_asuransi_ID_sequence"'::regclass) NOT NULL,
    id_permohonan_bg bigint,
    nomor_persetujuan character varying(255),
    tgl_persetujuan date,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    add_by bigint,
    dokumen text,
    nilai_premi double precision
);
 (   DROP TABLE public.persetujuan_asuransi;
       public         postgres    false    213            ?            1259    16430    principal_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."principal_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public."principal_ID_sequence";
       public       postgres    false            ?            1259    16556 	   principal    TABLE     ?  CREATE TABLE public.principal (
    id_principal bigint DEFAULT nextval('public."principal_ID_sequence"'::regclass) NOT NULL,
    nama_principal character varying(255),
    alamat_principal character varying(255),
    pic1 character varying(255),
    jabatan_pic1 character varying(255),
    nik_pic1 character varying(255),
    pic2 character varying(255),
    jabatan_pic2 character varying(255),
    nik_pic2 character varying(255),
    akta_principal text,
    nomor_akta_principal character varying(255),
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    tgl_akta_principal date,
    telp_pic1 character varying(255),
    telp_pic2 character varying(255)
);
    DROP TABLE public.principal;
       public         postgres    false    214            ?            1259    16432    status_permohonan_ID_sequence    SEQUENCE     ?   CREATE SEQUENCE public."status_permohonan_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public."status_permohonan_ID_sequence";
       public       postgres    false            ?            1259    16564    status_permohonan    TABLE       CREATE TABLE public.status_permohonan (
    id_status_permohonan bigint DEFAULT nextval('public."status_permohonan_ID_sequence"'::regclass) NOT NULL,
    status_permohonan character varying(255),
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
 %   DROP TABLE public.status_permohonan;
       public         postgres    false    215            ?            1259    16434    tr_cac_ID_sequence    SEQUENCE     }   CREATE SEQUENCE public."tr_cac_ID_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public."tr_cac_ID_sequence";
       public       postgres    false            ?            1259    16569    tr_cac    TABLE     ?  CREATE TABLE public.tr_cac (
    id_tr_cac bigint DEFAULT nextval('public."tr_cac_ID_sequence"'::regclass) NOT NULL,
    id_asuransi bigint,
    id_cabang_asuransi bigint,
    waktu date,
    plafond double precision,
    noa bigint,
    premi double precision,
    id_bank bigint,
    id_jenis_kredit bigint,
    add_time timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    add_by bigint
);
    DROP TABLE public.tr_cac;
       public         postgres    false    216            U           2604    65483    agent id_agent    DEFAULT     q   ALTER TABLE ONLY public.agent ALTER COLUMN id_agent SET DEFAULT nextval('public."agent_ID_sequence"'::regclass);
 =   ALTER TABLE public.agent ALTER COLUMN id_agent DROP DEFAULT;
       public       postgres    false    247    246            R           2604    65469    anggota id_anggota    DEFAULT     w   ALTER TABLE ONLY public.anggota ALTER COLUMN id_anggota SET DEFAULT nextval('public."anggota_ID_sequence"'::regclass);
 A   ALTER TABLE public.anggota ALTER COLUMN id_anggota DROP DEFAULT;
       public       postgres    false    245    244            P           2604    17592    bayar_komisi id_bayar_komisi    DEFAULT     |   ALTER TABLE ONLY public.bayar_komisi ALTER COLUMN id_bayar_komisi SET DEFAULT nextval('public.bayar_komisi_seq'::regclass);
 K   ALTER TABLE public.bayar_komisi ALTER COLUMN id_bayar_komisi DROP DEFAULT;
       public       postgres    false    243    242            O           2604    17584    dokumen id_dokumen    DEFAULT     m   ALTER TABLE ONLY public.dokumen ALTER COLUMN id_dokumen SET DEFAULT nextval('public.dokumen_seq'::regclass);
 A   ALTER TABLE public.dokumen ALTER COLUMN id_dokumen DROP DEFAULT;
       public       postgres    false    241    240            L           2604    17572 .   jenis_dok_persyaratan id_jenis_dok_persyaratan    DEFAULT     ?   ALTER TABLE ONLY public.jenis_dok_persyaratan ALTER COLUMN id_jenis_dok_persyaratan SET DEFAULT nextval('public.jenis_dok_syarat_id_sequence'::regclass);
 ]   ALTER TABLE public.jenis_dok_persyaratan ALTER COLUMN id_jenis_dok_persyaratan DROP DEFAULT;
       public       postgres    false    238    239    239            /          0    65474    agent 
   TABLE DATA               e   COPY public.agent (id_agent, nama, telp, alamat, email, status, add_time, kode_referral) FROM stdin;
    public       postgres    false    246   ??       -          0    65462    anggota 
   TABLE DATA               w   COPY public.anggota (id_anggota, pt, pic, tlp, tgl, jam, bg, file, periode_bulan, add_time, kode_refferal) FROM stdin;
    public       postgres    false    244   Y?                 0    16436    asum 
   TABLE DATA               ?   COPY public.asum (id_asum, tertanggung, produk, no_polis, tgl_polis, premi, tgl_penagihan, no_surat_penagihan, komisi, keterangan, add_time) FROM stdin;
    public       postgres    false    217   ??                 0    16444    asuransi 
   TABLE DATA               P   COPY public.asuransi (id_asuransi, nama_asuransi, add_by, add_time) FROM stdin;
    public       postgres    false    218   ??                 0    16449    bank 
   TABLE DATA               D   COPY public.bank (id_bank, nama_bank, add_time, add_by) FROM stdin;
    public       postgres    false    219   ?                 0    16454    bank_garansi 
   TABLE DATA               a   COPY public.bank_garansi (id_bg, no_bg, tgl_bg, dokumen, add_time, id_permohonan_bg) FROM stdin;
    public       postgres    false    220   O?       +          0    17585    bayar_komisi 
   TABLE DATA               ?   COPY public.bayar_komisi (id_bayar_komisi, komisi_dibayar, tgl_bayar, bukti_bayar, id_permohonan, add_time, add_by, nomor_penagihan, tgl_penagihan) FROM stdin;
    public       postgres    false    242   ??                 0    16462    cabang_asuransi 
   TABLE DATA               ?   COPY public.cabang_asuransi (id_cabang_asuransi, id_asuransi, nama_cabang, alamat, telepon, email, add_time, add_by) FROM stdin;
    public       postgres    false    221   ?                 0    16470    cabang_bank 
   TABLE DATA               ]   COPY public.cabang_bank (id_cabang_bank, id_bank, cabang_bank, add_time, add_by) FROM stdin;
    public       postgres    false    222   ??                 0    16475    cbc 
   TABLE DATA               X  COPY public.cbc (id_cbc, surat_tagihan, tgl_tagih_sm, id_bank, pembawa_bisnis, principal, no_surat_bank, tgl_surat_bank, nilai_pertanggungan, nilai_premi, potensi_komisi, no_npp, tgl_npp, no_surat_tagih, tgl_surat_tagih, jumlah_tagih, tgl_masuk_tagih, ket, bukti_bayar, id_asuransi, no_polis, tgl_polis, bb_premi, add_time, add_by) FROM stdin;
    public       postgres    false    223   ?       )          0    17574    dokumen 
   TABLE DATA               ?   COPY public.dokumen (id_dokumen, nama_dokumen, jenis_dokumen, id_permohonan_bg, add_time, tgl_terbit, dokumen, id_transaksi) FROM stdin;
    public       postgres    false    240   "?                 0    16483    dokumen_persyaratan 
   TABLE DATA               ?   COPY public.dokumen_persyaratan (id_dokumen_persyaratan, id_permohonan_bg, dokumen_persyaratan, id_jenis_dokumen_persyaratan, status_aktif, add_time, add_by, kelengkapan, valid, nomor_dokumen, tgl_berakhir_dok) FROM stdin;
    public       postgres    false    224   ??                 0    16491    jenis_bg 
   TABLE DATA               K   COPY public.jenis_bg (id_jenis_bg, jenis_bg, add_time, add_by) FROM stdin;
    public       postgres    false    225   ??       (          0    17569    jenis_dok_persyaratan 
   TABLE DATA               j   COPY public.jenis_dok_persyaratan (id_jenis_dok_persyaratan, jenis_dok_persyaratan, add_time) FROM stdin;
    public       postgres    false    239   &?                 0    16496    jenis_kredit 
   TABLE DATA               W   COPY public.jenis_kredit (id_jenis_kredit, jenis_kredit, add_time, add_by) FROM stdin;
    public       postgres    false    226   ??                 0    16501    kelengkapan_dokumen_penagihan 
   TABLE DATA               ?   COPY public.kelengkapan_dokumen_penagihan (id_kelengkapan, id_permohonan, dokumen_kelengkapan, status, add_time, add_by, kelengkapan, valid, dokumen) FROM stdin;
    public       postgres    false    227   ?                 0    16509    legalitas_permohonan 
   TABLE DATA               ?   COPY public.legalitas_permohonan (id_legalitas, id_permohonan_bg, nama_notaris, alamat_notaris, no_ktp, pengadilan, alamat_pengadilan, pasal, add_time, add_by, status) FROM stdin;
    public       postgres    false    228   ??                 0    16517    level 
   TABLE DATA               :   COPY public.level (id_level, level, add_time) FROM stdin;
    public       postgres    false    229   %?                 0    16522    pengantar_asuransi 
   TABLE DATA               k   COPY public.pengantar_asuransi (id_pengantar_asuransi, id_permohonan_bg, tgl_terbit, add_time) FROM stdin;
    public       postgres    false    230   ??                  0    16527    pengantar_bank 
   TABLE DATA               c   COPY public.pengantar_bank (id_pengantar_bank, id_permohonan_bg, tgl_terbit, add_time) FROM stdin;
    public       postgres    false    231   ??       !          0    16532    pengguna 
   TABLE DATA               ?   COPY public.pengguna (id_pengguna, nama_lengkap, nik, alamat, email, id_level, add_time, no_telp, username, password) FROM stdin;
    public       postgres    false    232   <?       "          0    16540    permohonan_bank_garansi 
   TABLE DATA               ?  COPY public.permohonan_bank_garansi (id_permohonan, nomor_registrasi, nomor_surat_permohonan, tgl_surat_permohonan, no_surat_undangan, tgl_surat_undangan, id_cabang_asuransi, nama_oblige, alamat_oblige, nama_pekerjaan, nilai_kontrak, nilai_jaminan, id_status_permohonan, add_time, tgl_registrasi, id_principal, id_bg, id_cabang_bank, id_jenis_bg, jangka_waktu_awal, jangka_waktu_akhir, tgl_terbit_jaminan, kode_referral) FROM stdin;
    public       postgres    false    233   ?       #          0    16548    persetujuan_asuransi 
   TABLE DATA               ?   COPY public.persetujuan_asuransi (id_persetujuan_asuransi, id_permohonan_bg, nomor_persetujuan, tgl_persetujuan, add_time, add_by, dokumen, nilai_premi) FROM stdin;
    public       postgres    false    234   ??       $          0    16556 	   principal 
   TABLE DATA               ?   COPY public.principal (id_principal, nama_principal, alamat_principal, pic1, jabatan_pic1, nik_pic1, pic2, jabatan_pic2, nik_pic2, akta_principal, nomor_akta_principal, add_time, tgl_akta_principal, telp_pic1, telp_pic2) FROM stdin;
    public       postgres    false    235   ??       %          0    16564    status_permohonan 
   TABLE DATA               ^   COPY public.status_permohonan (id_status_permohonan, status_permohonan, add_time) FROM stdin;
    public       postgres    false    236   $?       &          0    16569    tr_cac 
   TABLE DATA               ?   COPY public.tr_cac (id_tr_cac, id_asuransi, id_cabang_asuransi, waktu, plafond, noa, premi, id_bank, id_jenis_kredit, add_time, add_by) FROM stdin;
    public       postgres    false    237   ?       <           0    0    agent_ID_sequence    SEQUENCE SET     A   SELECT pg_catalog.setval('public."agent_ID_sequence"', 4, true);
            public       postgres    false    247            =           0    0    anggota_ID_sequence    SEQUENCE SET     D   SELECT pg_catalog.setval('public."anggota_ID_sequence"', 57, true);
            public       postgres    false    245            >           0    0    asum_ID_sequence    SEQUENCE SET     @   SELECT pg_catalog.setval('public."asum_ID_sequence"', 2, true);
            public       postgres    false    196            ?           0    0    asuransi_ID_sequence    SEQUENCE SET     D   SELECT pg_catalog.setval('public."asuransi_ID_sequence"', 2, true);
            public       postgres    false    197            @           0    0    bank_ID_sequence    SEQUENCE SET     A   SELECT pg_catalog.setval('public."bank_ID_sequence"', 2, false);
            public       postgres    false    198            A           0    0    bank_garansi_ID_sequence    SEQUENCE SET     I   SELECT pg_catalog.setval('public."bank_garansi_ID_sequence"', 26, true);
            public       postgres    false    199            B           0    0    bayar_komisi_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.bayar_komisi_seq', 8, true);
            public       postgres    false    243            C           0    0    cabang_asuransi_ID_sequence    SEQUENCE SET     K   SELECT pg_catalog.setval('public."cabang_asuransi_ID_sequence"', 2, true);
            public       postgres    false    200            D           0    0    cabang_bank_ID_sequence    SEQUENCE SET     G   SELECT pg_catalog.setval('public."cabang_bank_ID_sequence"', 2, true);
            public       postgres    false    201            E           0    0    cbc_ID_sequence    SEQUENCE SET     @   SELECT pg_catalog.setval('public."cbc_ID_sequence"', 2, false);
            public       postgres    false    202            F           0    0    dokumen_persyaratan_ID_sequence    SEQUENCE SET     R   SELECT pg_catalog.setval('public."dokumen_persyaratan_ID_sequence"', 1101, true);
            public       postgres    false    203            G           0    0    dokumen_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.dokumen_seq', 79, true);
            public       postgres    false    241            H           0    0    jenis_bg_ID_sequence    SEQUENCE SET     E   SELECT pg_catalog.setval('public."jenis_bg_ID_sequence"', 2, false);
            public       postgres    false    204            I           0    0    jenis_dok_syarat_id_sequence    SEQUENCE SET     K   SELECT pg_catalog.setval('public.jenis_dok_syarat_id_sequence', 18, true);
            public       postgres    false    238            J           0    0    jenis_kredit_ID_sequence    SEQUENCE SET     I   SELECT pg_catalog.setval('public."jenis_kredit_ID_sequence"', 2, false);
            public       postgres    false    205            K           0    0    kelengkapan_ID_sequence    SEQUENCE SET     H   SELECT pg_catalog.setval('public."kelengkapan_ID_sequence"', 38, true);
            public       postgres    false    206            L           0    0    legalitas_ID_sequence    SEQUENCE SET     F   SELECT pg_catalog.setval('public."legalitas_ID_sequence"', 21, true);
            public       postgres    false    207            M           0    0    level_ID_sequence    SEQUENCE SET     B   SELECT pg_catalog.setval('public."level_ID_sequence"', 2, false);
            public       postgres    false    208            N           0    0    pengantar_asuransi_ID_sequence    SEQUENCE SET     O   SELECT pg_catalog.setval('public."pengantar_asuransi_ID_sequence"', 18, true);
            public       postgres    false    209            O           0    0    pengantar_bank_ID_sequence    SEQUENCE SET     K   SELECT pg_catalog.setval('public."pengantar_bank_ID_sequence"', 16, true);
            public       postgres    false    210            P           0    0    pengguna_ID_sequence    SEQUENCE SET     D   SELECT pg_catalog.setval('public."pengguna_ID_sequence"', 2, true);
            public       postgres    false    211            Q           0    0    permohonan_ID_sequence    SEQUENCE SET     H   SELECT pg_catalog.setval('public."permohonan_ID_sequence"', 120, true);
            public       postgres    false    212            R           0    0     persetujuan_asuransi_ID_sequence    SEQUENCE SET     Q   SELECT pg_catalog.setval('public."persetujuan_asuransi_ID_sequence"', 37, true);
            public       postgres    false    213            S           0    0    principal_ID_sequence    SEQUENCE SET     F   SELECT pg_catalog.setval('public."principal_ID_sequence"', 58, true);
            public       postgres    false    214            T           0    0    status_permohonan_ID_sequence    SEQUENCE SET     N   SELECT pg_catalog.setval('public."status_permohonan_ID_sequence"', 2, false);
            public       postgres    false    215            U           0    0    tr_cac_ID_sequence    SEQUENCE SET     C   SELECT pg_catalog.setval('public."tr_cac_ID_sequence"', 2, false);
            public       postgres    false    216            ?           2606    65466    anggota anggota_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.anggota
    ADD CONSTRAINT anggota_pkey PRIMARY KEY (id_anggota);
 >   ALTER TABLE ONLY public.anggota DROP CONSTRAINT anggota_pkey;
       public         postgres    false    244            W           2606    16575    asum asum_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.asum
    ADD CONSTRAINT asum_pkey PRIMARY KEY (id_asum);
 8   ALTER TABLE ONLY public.asum DROP CONSTRAINT asum_pkey;
       public         postgres    false    217            Y           2606    16577    asuransi asuransi_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.asuransi
    ADD CONSTRAINT asuransi_pkey PRIMARY KEY (id_asuransi);
 @   ALTER TABLE ONLY public.asuransi DROP CONSTRAINT asuransi_pkey;
       public         postgres    false    218            ]           2606    16581    bank_garansi bank_garansi_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.bank_garansi
    ADD CONSTRAINT bank_garansi_pkey PRIMARY KEY (id_bg);
 H   ALTER TABLE ONLY public.bank_garansi DROP CONSTRAINT bank_garansi_pkey;
       public         postgres    false    220            [           2606    16579    bank bank_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.bank
    ADD CONSTRAINT bank_pkey PRIMARY KEY (id_bank);
 8   ALTER TABLE ONLY public.bank DROP CONSTRAINT bank_pkey;
       public         postgres    false    219            ?           2606    17589    bayar_komisi bayar_komisi_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.bayar_komisi
    ADD CONSTRAINT bayar_komisi_pkey PRIMARY KEY (id_bayar_komisi);
 H   ALTER TABLE ONLY public.bayar_komisi DROP CONSTRAINT bayar_komisi_pkey;
       public         postgres    false    242            _           2606    16583 $   cabang_asuransi cabang_asuransi_pkey 
   CONSTRAINT     r   ALTER TABLE ONLY public.cabang_asuransi
    ADD CONSTRAINT cabang_asuransi_pkey PRIMARY KEY (id_cabang_asuransi);
 N   ALTER TABLE ONLY public.cabang_asuransi DROP CONSTRAINT cabang_asuransi_pkey;
       public         postgres    false    221            a           2606    16585    cabang_bank cabang_bank_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.cabang_bank
    ADD CONSTRAINT cabang_bank_pkey PRIMARY KEY (id_cabang_bank);
 F   ALTER TABLE ONLY public.cabang_bank DROP CONSTRAINT cabang_bank_pkey;
       public         postgres    false    222            c           2606    16587    cbc cbc_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.cbc
    ADD CONSTRAINT cbc_pkey PRIMARY KEY (id_cbc);
 6   ALTER TABLE ONLY public.cbc DROP CONSTRAINT cbc_pkey;
       public         postgres    false    223            e           2606    16589 ,   dokumen_persyaratan dokumen_persyaratan_pkey 
   CONSTRAINT     ~   ALTER TABLE ONLY public.dokumen_persyaratan
    ADD CONSTRAINT dokumen_persyaratan_pkey PRIMARY KEY (id_dokumen_persyaratan);
 V   ALTER TABLE ONLY public.dokumen_persyaratan DROP CONSTRAINT dokumen_persyaratan_pkey;
       public         postgres    false    224            g           2606    16591    jenis_bg jenis_bg_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.jenis_bg
    ADD CONSTRAINT jenis_bg_pkey PRIMARY KEY (id_jenis_bg);
 @   ALTER TABLE ONLY public.jenis_bg DROP CONSTRAINT jenis_bg_pkey;
       public         postgres    false    225            i           2606    16593    jenis_kredit jenis_kredit_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.jenis_kredit
    ADD CONSTRAINT jenis_kredit_pkey PRIMARY KEY (id_jenis_kredit);
 H   ALTER TABLE ONLY public.jenis_kredit DROP CONSTRAINT jenis_kredit_pkey;
       public         postgres    false    226            k           2606    16595 @   kelengkapan_dokumen_penagihan kelengkapan_dokumen_penagihan_pkey 
   CONSTRAINT     ?   ALTER TABLE ONLY public.kelengkapan_dokumen_penagihan
    ADD CONSTRAINT kelengkapan_dokumen_penagihan_pkey PRIMARY KEY (id_kelengkapan);
 j   ALTER TABLE ONLY public.kelengkapan_dokumen_penagihan DROP CONSTRAINT kelengkapan_dokumen_penagihan_pkey;
       public         postgres    false    227            m           2606    16597 .   legalitas_permohonan legalitas_permohonan_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.legalitas_permohonan
    ADD CONSTRAINT legalitas_permohonan_pkey PRIMARY KEY (id_legalitas);
 X   ALTER TABLE ONLY public.legalitas_permohonan DROP CONSTRAINT legalitas_permohonan_pkey;
       public         postgres    false    228            o           2606    16599    level level_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.level
    ADD CONSTRAINT level_pkey PRIMARY KEY (id_level);
 :   ALTER TABLE ONLY public.level DROP CONSTRAINT level_pkey;
       public         postgres    false    229            q           2606    16601 *   pengantar_asuransi pengantar_asuransi_pkey 
   CONSTRAINT     {   ALTER TABLE ONLY public.pengantar_asuransi
    ADD CONSTRAINT pengantar_asuransi_pkey PRIMARY KEY (id_pengantar_asuransi);
 T   ALTER TABLE ONLY public.pengantar_asuransi DROP CONSTRAINT pengantar_asuransi_pkey;
       public         postgres    false    230            s           2606    16603 "   pengantar_bank pengantar_bank_pkey 
   CONSTRAINT     o   ALTER TABLE ONLY public.pengantar_bank
    ADD CONSTRAINT pengantar_bank_pkey PRIMARY KEY (id_pengantar_bank);
 L   ALTER TABLE ONLY public.pengantar_bank DROP CONSTRAINT pengantar_bank_pkey;
       public         postgres    false    231            u           2606    16605    pengguna pengguna_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.pengguna
    ADD CONSTRAINT pengguna_pkey PRIMARY KEY (id_pengguna);
 @   ALTER TABLE ONLY public.pengguna DROP CONSTRAINT pengguna_pkey;
       public         postgres    false    232            w           2606    16607 4   permohonan_bank_garansi permohonan_bank_garansi_pkey 
   CONSTRAINT     }   ALTER TABLE ONLY public.permohonan_bank_garansi
    ADD CONSTRAINT permohonan_bank_garansi_pkey PRIMARY KEY (id_permohonan);
 ^   ALTER TABLE ONLY public.permohonan_bank_garansi DROP CONSTRAINT permohonan_bank_garansi_pkey;
       public         postgres    false    233            y           2606    16609 .   persetujuan_asuransi persetujuan_asuransi_pkey 
   CONSTRAINT     ?   ALTER TABLE ONLY public.persetujuan_asuransi
    ADD CONSTRAINT persetujuan_asuransi_pkey PRIMARY KEY (id_persetujuan_asuransi);
 X   ALTER TABLE ONLY public.persetujuan_asuransi DROP CONSTRAINT persetujuan_asuransi_pkey;
       public         postgres    false    234            {           2606    16611    principal principal_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.principal
    ADD CONSTRAINT principal_pkey PRIMARY KEY (id_principal);
 B   ALTER TABLE ONLY public.principal DROP CONSTRAINT principal_pkey;
       public         postgres    false    235            }           2606    16613 (   status_permohonan status_permohonan_pkey 
   CONSTRAINT     x   ALTER TABLE ONLY public.status_permohonan
    ADD CONSTRAINT status_permohonan_pkey PRIMARY KEY (id_status_permohonan);
 R   ALTER TABLE ONLY public.status_permohonan DROP CONSTRAINT status_permohonan_pkey;
       public         postgres    false    236                       2606    16615    tr_cac tr_cae_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.tr_cac
    ADD CONSTRAINT tr_cae_pkey PRIMARY KEY (id_tr_cac);
 <   ALTER TABLE ONLY public.tr_cac DROP CONSTRAINT tr_cae_pkey;
       public         postgres    false    237            /   ?   x???M
?0???)?@??iL?????ݤ???ڞ?&?Ftf?1C??>???5?@???D!???7???'ne?O???T`]???Xj,jh/??C??Q?c?-rL?1q??9bN?4¹o?????<??????&?dX?u?/}Z?????{}&ՖJ?$GT5      -   #  x???;o?0 ???+<??_!?-?P?42Tb9??V^?	??_ߐR3T??1?w>????|??c??p?ـz?@?RLJ?sXE????L^?),?f?"V?x6???6A;-??&??Z????rJ?N?(??R??T???B??'??z?x&s??EG???H?????[?P?N1V%6?7qe?eBe???,Շ.?}???i???T?V?u"gҕ?J?F??z??JW???T??`f47?qA?썔 ????C8????(?#??H????/?%???X:c&??ƶ,?O ??            x?????? ? ?         O   x?=ʱ?0 ????:p?4?6???._??1??z???a[W??+iaM?4BY??s?B{??J?p??????         7   x?3?tJ??6?4202?50?54V00?21?22?355501?4?4576?????? ???         O   x?32????4202?50?54?L6
?Lq??M/?Hq?̌2?,Mvʅ?10V0??24?21г04445?444?????? ?       +   R   x????4 N##]]C#?d??????????7??(c??d??\NCCs$u
FV??V??f????&?1~@????? ?
?         ?   x?M?;
?0??)t???gU1?s????H?\?!??y0C@pջ??i????u!VݴM??????y?e?K?ks?;???"/??y!??I??_Ğ>?0޾;?s	? ??c??x???1m?*?         S   x?U?-?0Pݞb??~????	f?A???G??OI???\?>ף?D?QK??"??J??7Ư??@??V?*Л?8y$f~?wT            x?????? ? ?      )      x?????? ? ?         E  x???mOA?_ç????????D%?A?M?F?")h?*????8ϝ4iC???7?;?????mM??q???'4??4??o?{?1??????򹷾}<=m?8u??.PW??1?o?????n#X??͒??ˤ?,?~2M?aoڏz?M?-Y???J?۶z	!ˢ?,???'ID?$^%?ut??s?:?=??O-??%???M?Lh?0Y??7[?9?ø?eߣ??o??5?7F??4??L??Q????6Y?M2]o?[??t|8??y??+:D??ۤ?h3O??
?%?Fˏ???`??9??++?.?????pu?????MB/???????????KG>$1y???]??*???R?_?!m?*?}??BV?A0Z,?k?b???5YŃZY??????elX??҄??,?%????c?Ni
km??iUX?Jo /????2?,(?;?????.?~oAqi-d??P@xϢ?V???ַ??ط&?~c?[?v???.+?:?Jb?F??Ke?L?N??RUI?YB??i?S?J??O??????~??|h#(?S?U???!UW?69d??n??e3?꺿?N?lz????zЯ????f???<??ϼ?????"?اѓ{?X?`?4???e???|??O?,q?,!U???ݶ8?????M??J??p(u?????\M?҅ ?8?kP'?|?OJa?d?֏?:??A??X?36L?0I?$2`?$&?D`\??2gW$&Y???g?I?I?'?:iwx?,f˒???Wps??Yg?ŵ	?O????'?YǓ.|??͑?yf???#kt2DXct?Sv:?̥џQ?:?v?/?w?F         ?   x?m?1?0 ?9yE>?ȱ?	HH??X"????"??D???.??????S?k?? 4 ?
?2?T?d??<{????j???2FHcy;???v????J*`?B	???mm?t??O')
#?/?{??5j      (   ?  x?m?Mr?0???)t?p??vn?i?&ۙl?a?v?(UZ????E??w??? ??}??n?5??wcmeMM\[?]??Z?S??n??C?C	S?d?c??,p???q?H&?ݺ-f-????~}??|FBm?6l8??܄S??f6?"Du?>]!?h9?$>6W ?6RtШmSX]??9?Du?q?]?wc~?U??y?񥄓?)??????\m????kcj#)???]?]?jKI?OGHj=??"]m???t?ƒ?V'c??d??׿V???$??vr	Ɗ ?,d????8L? 9ǟ?,!/?s?`P??0?????2??|.k?i?$߀Q}9??Ks?????|?ZX#j?D?]f??oSţ?:?wI?v??}?EU&g?????Ӷh         C   x??0?432??J??,?.JM?,1?4202?50?54V00?21?25?35?005?4?4576?????? ???         t  x????n?0Ư?)x????M??l?t*?x?)DpQ??ӯ:\ܦ?,m?4?????z??p?7ż`??Z+??a?"???"?)1(A5??+߃???J?????z??oG?twu??ݳ?lk?	?8?2^?c?,???(X$p??,O%?])??? ????HH??Q???1_??Ja??]??v_??}??)7????)??R??D2Y?VRf?QD?G?h?ӗ?$-??0??cnd?9*?H;????J\?????JE?X???%?SdP?C?m???6??o??Y?ů#??W?Gʞ}}?zB??q?EЎ꫓q?a?2:?M?WάE?F?x?6? :U???]???T??{?U??;Q? ?          ?   x?E?K
?0E?/???/m^?.@\???H)H??7??r?N?????'??Fpɵ|?
?#"?u?e{?z????8??BYK?)3L?n?? |?[??t?EUa)?}YX????TE?8????w?? ?g*         L   x?3?tL????4202?50?50R04?26?26?2??/H-J,?/B?6?2??22?2??N-M?KO?Ô6??????? e?         V   x?M???0?w?"4?)?,????F?%????h
??p?S;g??0t??)???O?????s??qn?????,?@2L?!"/?m?          E   x?M?9?0?ZBa?[?,??#??M?G*???~Ӗ?q?dv??R?+??-?A?? ??_a???      !   ?   x?m??n?0????)?ȶ???q???u???????\?6Mշo?@?wG?N??_??cPL?o??^?h???Z??>t?<?-02>???Peh2e$c?dv]j?.??%????~fߧ2?a????g???V3?DO+?\ј?b???1???ڜ??K????s*?-??U?Ee?z??????o???b??b'??έBj      "   ?   x?}PMO?0=;??????Y?۸p+?]BU???M??/??"!?(?x??K??Q?!???32??j?Z??v?8?b ?.????e_8L?|?drކ?s??W?pw???B??æ???n h=?:Y??B%$?3D??s??k????Tr??z9??o_??V??dm???1ȩ6?K ???mCȸ
??????|s͢??????Qsj?1_w?^?      #   ?   x?M??
?@?ϻO?(??????%HQH?r]ŋJ&X?!}??C5s?????x@??k?,p,??7????mD??WII? J3?e??O:?Ͳ????3?D??<?mx??*?	cH?f?o??n????9??Hŗ??t?*?5?&^Jsd?C??M???s?˥>ɩ??z?#Zٔ?7~f6,      $   T  x??V?n?8}?|?~??ë??X?v?^X?/?$;?S?+ٱ??w([?l?Am%qH?Ι+?c???կ??????`???{??)??&?W?????]5????R??!PRə??L?\?\?????? ??D??*??2????e?~ɾ7?XG^x?u????ۦ???q??d:?_D??[??>e_?66?
>??j??6px??L?L??dNA????g~%{]?,??(?uѽ?Ҥa??7?nl)xXob?X???Y???l???ɉ?Vh?$??ڞ;??U?:>??X'????\?d????<???>?i??s???????Ğ?????*?M-*~??????&?Z6????P?$?\Yᤱ??ƝXkR$-;xM????Wؔ? ??^?]???m?&??ەբ?Ά$ؔl?5?͑U??X5?:t8?@?o;????('A??@?-6??MN?g?5????5?P^?VǠU??`Ϸ?=2???l[?l?M?S?/	?VX???X΀??)]??̿??꼾??M??????{d?}?????C???&!K/L?>?	d?i??5??????'A??A?8???????[VU?>L??;G\b?2VKrh??bzlۉ\#?lQM_???6??+F[Ij"?=???LB2?"??	?D?,1zD??,?Җ???$*?/?q9c?Pʲ??:a??]??cZ??s??^?B꠆Y?W)-?m1{?2?c	ͦi?i9.?)?x?Ȟ?һ?V??1????ؕ?c???{???%??`?8??v?o7$????$n?m??M?v??B?p???zQ_[??????????C?kSH???e????٦ja?^???!?t???N?Z?(P?dW??Ipx:;P??{;????C.o?5??ԟ???nw?tj?Fh?1??Ӂs???q?C-?O?oF#hq????Λ??Xy.??shn?? rB*??_ި41??O?\?P5?\Չ?Ryz?????2'??a???[??:"?w?K?;?mn????/f????ؖ?ԫY???9?~r?5?&??V?l????xZ?????̆<*r?I6?'g?????:???7??kU??>?3?9b3??jg??Ȟ??*??www?y??-      %   ?   x?u?;n?0k?)t?#)??? Ic m??آ }
??T? ?T???2?~??Tri??8?k[???!L???
?S.k???e?sY?_0???$d%?J ??K?n_[5???l1????Y8?ryd]g??g^???)???Q0xs?.??ݪ?8??O???R?*?V?ge{D>??>??cr??O?t棿?K~???w?>- ??0Y      &   H   x?-???0??0E?:B???	??M??/Kv?c??!;?!??x?D???d??9u!f?d?,???nU? A*     