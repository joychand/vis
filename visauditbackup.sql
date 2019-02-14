--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.9
-- Dumped by pg_dump version 9.6.9

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
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


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: anganwadis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.anganwadis (
    anganwadi_id integer NOT NULL,
    anganwadi_reference_year integer,
    total_anganwadi_centre integer,
    total_anganwadi_worker integer,
    total_enrolled_children integer,
    worker_mobile character varying(10),
    village_code character varying(6),
    anganwadi_worker_name character varying(150),
    first_qtr_pregnant integer,
    second_qtr_pregnant integer,
    third_qtr_pregnant integer
);


ALTER TABLE public.anganwadis OWNER TO postgres;

--
-- Name: Anganwadi_anganwadi_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Anganwadi_anganwadi_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Anganwadi_anganwadi_id_seq" OWNER TO postgres;

--
-- Name: Anganwadi_anganwadi_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Anganwadi_anganwadi_id_seq" OWNED BY public.anganwadis.anganwadi_id;


--
-- Name: education_infras; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.education_infras (
    education_infra_id integer NOT NULL,
    education_reference_year integer,
    total_govt_school integer,
    total_adc_school integer,
    total_private_school integer,
    total_primary_school integer,
    total_primary_student integer,
    total_jhs integer,
    total_jhs_student integer,
    total_secondary_school integer,
    total_secondary_student integer,
    total_hrsec_school integer,
    total_hrsec_student integer,
    village_code character varying(6),
    total_primary_teacher integer,
    total_jhs_teacher integer,
    total_secondary_teacher integer,
    total_hrsec_teacher integer
);


ALTER TABLE public.education_infras OWNER TO postgres;

--
-- Name: Education_Infra_education_infra_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Education_Infra_education_infra_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Education_Infra_education_infra_id_seq" OWNER TO postgres;

--
-- Name: Education_Infra_education_infra_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Education_Infra_education_infra_id_seq" OWNED BY public.education_infras.education_infra_id;


--
-- Name: food_securities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.food_securities (
    food_security_id integer NOT NULL,
    total_aay_members integer,
    total_phh_members integer,
    total_aadhaar_seeded_card integer,
    total_fair_price_shop integer,
    village_code character varying(6),
    reference_year integer,
    total_aay_card integer,
    total_phh_card integer,
    fair_price_shop_name character varying(200)
);


ALTER TABLE public.food_securities OWNER TO postgres;

--
-- Name: Food_Security_food_security_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Food_Security_food_security_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Food_Security_food_security_id_seq" OWNER TO postgres;

--
-- Name: Food_Security_food_security_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Food_Security_food_security_id_seq" OWNED BY public.food_securities.food_security_id;


--
-- Name: health_infras; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.health_infras (
    health_infra_id integer NOT NULL,
    health_reference_year integer,
    no_of_doctors integer,
    no_of_anm integer,
    no_of_staff_nurse integer,
    no_of_asha integer,
    asha_mobile character varying(10),
    village_code character varying(6),
    name_of_health_centre character varying(200)
);


ALTER TABLE public.health_infras OWNER TO postgres;

--
-- Name: Health_Infra_health_infra_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Health_Infra_health_infra_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Health_Infra_health_infra_id_seq" OWNER TO postgres;

--
-- Name: Health_Infra_health_infra_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Health_Infra_health_infra_id_seq" OWNED BY public.health_infras.health_infra_id;


--
-- Name: power_infras; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.power_infras (
    id bigint NOT NULL,
    village_code character varying(10),
    household_no integer,
    electrified_household_no integer,
    reference_year integer
);


ALTER TABLE public.power_infras OWNER TO postgres;

--
-- Name: PowerInfras_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."PowerInfras_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."PowerInfras_id_seq" OWNER TO postgres;

--
-- Name: PowerInfras_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."PowerInfras_id_seq" OWNED BY public.power_infras.id;


--
-- Name: users_roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users_roles (
    users_role_id integer NOT NULL,
    user_role_name character varying(15)
);


ALTER TABLE public.users_roles OWNER TO postgres;

--
-- Name: Users_Role_users_role_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Users_Role_users_role_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Users_Role_users_role_id_seq" OWNER TO postgres;

--
-- Name: Users_Role_users_role_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Users_Role_users_role_id_seq" OWNED BY public.users_roles.users_role_id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    user_id integer NOT NULL,
    user_creation_date timestamp(6) without time zone DEFAULT timezone('utc'::text, now()) NOT NULL,
    user_name character varying(50),
    password character varying(255),
    user_email character varying(100),
    user_mobile character varying(10),
    role_id integer
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: Users_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Users_user_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Users_user_id_seq" OWNER TO postgres;

--
-- Name: Users_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Users_user_id_seq" OWNED BY public.users.user_id;


--
-- Name: village_electorals; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.village_electorals (
    village_electoral_id integer NOT NULL,
    reference_year integer,
    electoral_total_household integer,
    electoral_total_voter integer,
    village_code character varying(6)
);


ALTER TABLE public.village_electorals OWNER TO postgres;

--
-- Name: Village_Electoral_village_electoral_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Village_Electoral_village_electoral_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Village_Electoral_village_electoral_id_seq" OWNER TO postgres;

--
-- Name: Village_Electoral_village_electoral_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Village_Electoral_village_electoral_id_seq" OWNED BY public.village_electorals.village_electoral_id;


--
-- Name: village_infos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.village_infos (
    village_info_id integer NOT NULL,
    village_photo1 bytea,
    village_photo2 bytea,
    village_photo3 bytea,
    distance_from_ib numeric(6,2),
    village_code character varying(6)
);


ALTER TABLE public.village_infos OWNER TO postgres;

--
-- Name: COLUMN village_infos.distance_from_ib; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.village_infos.distance_from_ib IS 'Distance from International Border in Km';


--
-- Name: Village_Info_village_info_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Village_Info_village_info_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Village_Info_village_info_id_seq" OWNER TO postgres;

--
-- Name: Village_Info_village_info_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Village_Info_village_info_id_seq" OWNED BY public.village_infos.village_info_id;


--
-- Name: nregas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.nregas (
    village_nrega_id integer NOT NULL,
    nrega_reference_year integer,
    total_job_card integer,
    village_code character varying(6)
);


ALTER TABLE public.nregas OWNER TO postgres;

--
-- Name: Village_Nrega_village_nrega_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Village_Nrega_village_nrega_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Village_Nrega_village_nrega_id_seq" OWNER TO postgres;

--
-- Name: Village_Nrega_village_nrega_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Village_Nrega_village_nrega_id_seq" OWNED BY public.nregas.village_nrega_id;


--
-- Name: village_nsaps; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.village_nsaps (
    village_nsap_id integer NOT NULL,
    total_widows_beneficiary integer,
    total_handicap_beneficiary integer,
    total_ignoaps_beneficiary integer,
    village_code character varying(6),
    reference_year integer
);


ALTER TABLE public.village_nsaps OWNER TO postgres;

--
-- Name: Village_Nsap_village_nsap_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Village_Nsap_village_nsap_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Village_Nsap_village_nsap_id_seq" OWNER TO postgres;

--
-- Name: Village_Nsap_village_nsap_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Village_Nsap_village_nsap_id_seq" OWNED BY public.village_nsaps.village_nsap_id;


--
-- Name: village_schemes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.village_schemes (
    village_scheme_id integer NOT NULL,
    village_code character varying(6),
    village_scheme_description character varying(250),
    scheme_code integer,
    village_scheme_start_fin_yr integer
);


ALTER TABLE public.village_schemes OWNER TO postgres;

--
-- Name: Village_Scheme_village_scheme_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Village_Scheme_village_scheme_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Village_Scheme_village_scheme_id_seq" OWNER TO postgres;

--
-- Name: Village_Scheme_village_scheme_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Village_Scheme_village_scheme_id_seq" OWNED BY public.village_schemes.village_scheme_id;


--
-- Name: agencies; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.agencies (
    agency_id integer NOT NULL,
    agency_name character varying(20)
);


ALTER TABLE public.agencies OWNER TO postgres;

--
-- Name: agencies_counting_agency_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.agencies_counting_agency_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.agencies_counting_agency_seq OWNER TO postgres;

--
-- Name: agencies_counting_agency_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.agencies_counting_agency_seq OWNED BY public.agencies.agency_id;


--
-- Name: connectivity_infras; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.connectivity_infras (
    id bigint NOT NULL,
    approached_road_status "char",
    distance_from_appr_road numeric(5,2),
    village_code character varying(10),
    reference_year integer
);


ALTER TABLE public.connectivity_infras OWNER TO postgres;

--
-- Name: connectivityInfras_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."connectivityInfras_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."connectivityInfras_id_seq" OWNER TO postgres;

--
-- Name: connectivityInfras_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."connectivityInfras_id_seq" OWNED BY public.connectivity_infras.id;


--
-- Name: departments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.departments (
    id integer NOT NULL,
    name character varying(50)
);


ALTER TABLE public.departments OWNER TO postgres;

--
-- Name: departments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.departments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departments_id_seq OWNER TO postgres;

--
-- Name: departments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.departments_id_seq OWNED BY public.departments.id;


--
-- Name: fileuploads; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fileuploads (
    id integer NOT NULL,
    user_name character varying(50)
);


ALTER TABLE public.fileuploads OWNER TO postgres;

--
-- Name: fileuploads_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.fileuploads_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fileuploads_id_seq OWNER TO postgres;

--
-- Name: fileuploads_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.fileuploads_id_seq OWNED BY public.fileuploads.id;


--
-- Name: formcategories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.formcategories (
    id integer NOT NULL,
    name character varying(50)
);


ALTER TABLE public.formcategories OWNER TO postgres;

--
-- Name: formcategories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.formcategories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.formcategories_id_seq OWNER TO postgres;

--
-- Name: formcategories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.formcategories_id_seq OWNED BY public.formcategories.id;


--
-- Name: populations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.populations (
    reference_year integer NOT NULL,
    total_household integer,
    total_population integer,
    village_code character varying(6) NOT NULL,
    counting_agency integer NOT NULL
);


ALTER TABLE public.populations OWNER TO postgres;

--
-- Name: schemes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.schemes (
    scheme_name character varying(100),
    department_id integer,
    scheme_code integer NOT NULL,
    scheme_financial_year integer,
    scheme_status character varying(20),
    sanction_amount numeric(5,3)
);


ALTER TABLE public.schemes OWNER TO postgres;

--
-- Name: schemes_scheme_code_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.schemes_scheme_code_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.schemes_scheme_code_seq OWNER TO postgres;

--
-- Name: schemes_scheme_code_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.schemes_scheme_code_seq OWNED BY public.schemes.scheme_code;


--
-- Name: subdistricts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.subdistricts (
    subdistrict_code character varying(30) NOT NULL,
    subdistrict_version integer,
    subdistrict_name character varying(100),
    subdistrict_name_local character varying(100),
    district_code character varying(20),
    census2001_code character varying(20),
    census2011_code character varying(20)
);


ALTER TABLE public.subdistricts OWNER TO postgres;

--
-- Name: village_disable_infos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.village_disable_infos (
    id bigint NOT NULL,
    village_code character varying(10),
    reference_year integer,
    blind integer,
    deaf integer,
    others integer
);


ALTER TABLE public.village_disable_infos OWNER TO postgres;

--
-- Name: villageDisableInfo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."villageDisableInfo_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."villageDisableInfo_id_seq" OWNER TO postgres;

--
-- Name: villageDisableInfo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."villageDisableInfo_id_seq" OWNED BY public.village_disable_infos.id;


--
-- Name: village_photos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.village_photos (
    id integer NOT NULL,
    photo character varying(255),
    photo_dir character varying(255),
    photo_type character varying(255),
    photo_size character varying(255),
    village_code character varying(20)
);


ALTER TABLE public.village_photos OWNER TO postgres;

--
-- Name: village_photos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.village_photos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.village_photos_id_seq OWNER TO postgres;

--
-- Name: village_photos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.village_photos_id_seq OWNED BY public.village_photos.id;


--
-- Name: villages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.villages (
    village_version integer,
    village_code character varying(6) NOT NULL,
    village_name character varying(150),
    sub_district_code character varying(4),
    census_2001_code character varying(8),
    census_2011_code character varying(6)
);


ALTER TABLE public.villages OWNER TO postgres;

--
-- Name: agencies agency_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.agencies ALTER COLUMN agency_id SET DEFAULT nextval('public.agencies_counting_agency_seq'::regclass);


--
-- Name: anganwadis anganwadi_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.anganwadis ALTER COLUMN anganwadi_id SET DEFAULT nextval('public."Anganwadi_anganwadi_id_seq"'::regclass);


--
-- Name: connectivity_infras id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.connectivity_infras ALTER COLUMN id SET DEFAULT nextval('public."connectivityInfras_id_seq"'::regclass);


--
-- Name: departments id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departments ALTER COLUMN id SET DEFAULT nextval('public.departments_id_seq'::regclass);


--
-- Name: education_infras education_infra_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.education_infras ALTER COLUMN education_infra_id SET DEFAULT nextval('public."Education_Infra_education_infra_id_seq"'::regclass);


--
-- Name: fileuploads id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fileuploads ALTER COLUMN id SET DEFAULT nextval('public.fileuploads_id_seq'::regclass);


--
-- Name: food_securities food_security_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.food_securities ALTER COLUMN food_security_id SET DEFAULT nextval('public."Food_Security_food_security_id_seq"'::regclass);


--
-- Name: formcategories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.formcategories ALTER COLUMN id SET DEFAULT nextval('public.formcategories_id_seq'::regclass);


--
-- Name: health_infras health_infra_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.health_infras ALTER COLUMN health_infra_id SET DEFAULT nextval('public."Health_Infra_health_infra_id_seq"'::regclass);


--
-- Name: nregas village_nrega_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nregas ALTER COLUMN village_nrega_id SET DEFAULT nextval('public."Village_Nrega_village_nrega_id_seq"'::regclass);


--
-- Name: power_infras id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.power_infras ALTER COLUMN id SET DEFAULT nextval('public."PowerInfras_id_seq"'::regclass);


--
-- Name: schemes scheme_code; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schemes ALTER COLUMN scheme_code SET DEFAULT nextval('public.schemes_scheme_code_seq'::regclass);


--
-- Name: users user_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN user_id SET DEFAULT nextval('public."Users_user_id_seq"'::regclass);


--
-- Name: users_roles users_role_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_roles ALTER COLUMN users_role_id SET DEFAULT nextval('public."Users_Role_users_role_id_seq"'::regclass);


--
-- Name: village_disable_infos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_disable_infos ALTER COLUMN id SET DEFAULT nextval('public."villageDisableInfo_id_seq"'::regclass);


--
-- Name: village_electorals village_electoral_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_electorals ALTER COLUMN village_electoral_id SET DEFAULT nextval('public."Village_Electoral_village_electoral_id_seq"'::regclass);


--
-- Name: village_infos village_info_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_infos ALTER COLUMN village_info_id SET DEFAULT nextval('public."Village_Info_village_info_id_seq"'::regclass);


--
-- Name: village_nsaps village_nsap_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_nsaps ALTER COLUMN village_nsap_id SET DEFAULT nextval('public."Village_Nsap_village_nsap_id_seq"'::regclass);


--
-- Name: village_photos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_photos ALTER COLUMN id SET DEFAULT nextval('public.village_photos_id_seq'::regclass);


--
-- Name: village_schemes village_scheme_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_schemes ALTER COLUMN village_scheme_id SET DEFAULT nextval('public."Village_Scheme_village_scheme_id_seq"'::regclass);


--
-- Name: Anganwadi_anganwadi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Anganwadi_anganwadi_id_seq"', 305, true);


--
-- Name: Education_Infra_education_infra_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Education_Infra_education_infra_id_seq"', 85, true);


--
-- Name: Food_Security_food_security_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Food_Security_food_security_id_seq"', 257, true);


--
-- Name: Health_Infra_health_infra_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Health_Infra_health_infra_id_seq"', 220, true);


--
-- Name: PowerInfras_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."PowerInfras_id_seq"', 4, true);


--
-- Name: Users_Role_users_role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Users_Role_users_role_id_seq"', 14, true);


--
-- Name: Users_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Users_user_id_seq"', 39, true);


--
-- Name: Village_Electoral_village_electoral_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Village_Electoral_village_electoral_id_seq"', 16, true);


--
-- Name: Village_Info_village_info_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Village_Info_village_info_id_seq"', 42, true);


--
-- Name: Village_Nrega_village_nrega_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Village_Nrega_village_nrega_id_seq"', 322, true);


--
-- Name: Village_Nsap_village_nsap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Village_Nsap_village_nsap_id_seq"', 270, true);


--
-- Name: Village_Scheme_village_scheme_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Village_Scheme_village_scheme_id_seq"', 8, true);


--
-- Data for Name: agencies; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.agencies (agency_id, agency_name) FROM stdin;
1	NERCORMP
2	Security
4	Census
3	GTV
5	HillHouse Tax
\.


--
-- Name: agencies_counting_agency_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.agencies_counting_agency_seq', 35, true);


--
-- Data for Name: anganwadis; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.anganwadis (anganwadi_id, anganwadi_reference_year, total_anganwadi_centre, total_anganwadi_worker, total_enrolled_children, worker_mobile, village_code, anganwadi_worker_name, first_qtr_pregnant, second_qtr_pregnant, third_qtr_pregnant) FROM stdin;
17	2018	1	1	19	8729951552	270792	SR KHITONG ANAL	0	0	0
18	2018	1	1	8	9402271939	270790	ST DUMNAI ANAL	0	0	0
19	2018	1	1	22	9402734631	270791	NG PACHE MOYON	0	0	0
20	2018	1	1	34	7629982854	270826	SR NERY 	0	0	0
21	2018	5	5	75	8119848571	931105	NG MENCHIM MONSANG	0	0	0
22	2018	2	2	31	8415984370	931135	HB KHINARY	0	0	0
23	2018	1	1	13	8974844435	931129	ROSE PALMEI 	0	0	0
24	2018	1	1	18	8731999877	931171	SK LATA LAMKANG 	0	0	0
25	2018	1	1	4	7628815076	931158	K ERAITIN	0	0	0
26	2018	1	1	19	8414978405	931138	SELTUN RAHENA	0	0	0
27	2018	2	2	23	8415851529	931130	TS MINHRING	0	0	0
28	2018	2	2	34	8731943050	270827	BD SHANGRANG	0	0	0
29	2018	1	1	16	8974102780	931162	W WARTHANGAM	0	0	0
30	2018	1	1	16	8131820277	270820	SK BONGSHUL	0	0	0
31	2018	1	1	10	8731999838	931166	TS SHANGNIJOY MONSANG	0	0	0
32	2018	1	1	16	7085877945	931163	DY REBECCA ANAL	0	0	0
33	2018	2	2	47	9612482874	270797	TH RABITIN MONSANG	0	0	0
34	2018	2	2	18	8413977639	270799	W TOMANBI MONSANG	0	0	0
35	2018	1	1	10	7085347489	931232	KH BONGNU LAMKANG	0	0	0
36	2018	2	2	23	8732050251	270798	SD TERESA	0	0	0
37	2018	1	1	11	8131820339	931229	KH NAOMI CHOTHE 	0	0	0
38	2018	1	1	13	8119027705	931221	NI PEACEWAR	0	0	0
39	2018	1	1	19	8730597751	931094	SK THAMPRIL LAMKANG	0	0	0
40	2018	1	1	12	8974093792	270800	TH PHETIN MONSANG	0	0	0
41	2018	1	1	13	8974866814	270796	SUNGNEM REENA	0	0	0
42	2018	1	1	14	7085481019	931106	PR MERCY CHOTHE	0	0	0
43	2018	1	1	11	8131820181	270823	ST THANIA ANAL 	0	0	0
44	2018	1	1	34	9402879141	270795	SN MARY LAMKANG 	0	0	0
45	2018	1	1	28	8413045525	270764	RD RININGKHAM ANAL	0	0	0
46	2018	2	2	34	7628815955	270817	KH CHIPI	0	0	0
47	2018	1	1	14	9862522006	270801	Y MALA 	0	0	0
48	2018	2	2	28	8974669468	270802	PR LEIRANGAMBI 	0	0	0
49	2018	1	1	10	9612582651	270803	TH TEJAMANI CHOTHE 	0	0	0
50	2018	1	1	16	8415052279	931219	MK TAMPHAMANI CHOTHE 	0	0	0
51	2018	1	1	9	7630944627	931176	KH SHOMWAR LAMKANG 	0	0	0
52	2018	1	1	13	8415873226	931231	M HANNAH CHOTHE 	0	0	0
53	2018	1	1	18	8732050411	931220	MK RINGJOUHOI CHOTHE 	0	0	0
54	2018	2	2	13	8730899112	931189	SP RAHAB 	0	0	0
55	2018	1	1	9	8729923957	270822	R SHANGTHAHRING ANAL	0	0	0
56	2018	3	3	45	7629931686	270805	RUMESHA NGURUW MOYON	0	0	0
57	2018	1	1	17	9612490622	270809	S NORJANI 	0	0	0
58	2018	2	2	26	7085603377	270804	TS TONINGTHA 	0	0	0
59	2018	2	2	19	8415991641	270806	CH WIRNONG 	0	0	0
60	2018	1	1	41	8974555619	270808	SS TOSHIL 	0	0	0
61	2018	2	2	29	8131976335	931230	N ALPHONSHA	0	0	0
62	2018	1	1	29	8415042801	270811	SK SHANGSHANG	0	0	0
63	2018	1	1	25	8974405385	270810	SK PREMILA	0	0	0
64	2018	1	1	9	9615866060	931092	M Hatkholam Haokip	0	0	0
65	2018	1	1	8	8730899337	931101	Phaneithem Guite	0	0	0
66	2018	1	1	7	9862895085	931103	T Lheineiting Haokip	0	0	0
67	2018	2	2	5	8131803915	931108	Rebec Hoikhochin	0	0	0
68	2018	2	2	17	8415032058	270844	LYDIA NIAHOUCHIN	0	0	0
69	2018	1	1	8	7629865206	931110	Ngahlalkim Khongsai	0	0	0
70	2018	1	1	16	9862837749	270846	M LYNDA NOUNEIKIM	0	0	0
71	2018	1	1	0	8732060911	270678	Nengneihat Haokip	0	0	0
72	2018	2	2	39	7085456085	270746	CH ACHIM	0	0	0
74	2018	1	1	10	9856785279	270978	Veikhokim Baite	0	0	0
75	2018	3	3	44	9862193772	270747	KH TENGAM	0	0	0
73	2018	1	1	40	879962348	270842	LT VAHCHIN	0	0	0
76	2018	2	2	20	9436410179	270962	Lhingneikim Mate	0	0	0
77	2018	1	1	7	8414005758	270855	THANGNEIKUM	0	0	0
78	2018	1	1	15	9612553213	270852	CHINEILHING	0	0	0
79	2018	2	2	35	8132937811	270749	KN DARING	0	0	0
80	2018	1	1	11	8974608446	270869	M TINGKHOKIM	0	0	0
81	2018	1	1	18	9402963203	270871	TINGKHOCHIN	0	0	0
82	2018	2	2	18	8974194601	931222	DP TEDUN 	0	0	0
83	2018	1	1	11	9383115085	931118	Nemneilhing Haokip	0	0	0
84	2018	2	2	15	8131075288	270961	Dimkhokim Haokip	0	0	0
85	2018	1	1	28	8730960716	270856	LAMKHONENG HAOKIP	0	0	0
86	2018	2	2	18	9862011780	931134	Mary Tinkhochin	0	0	0
87	2018	3	3	56	8131055788	270807	KH HLINGBOI	0	0	0
88	2018	1	1	16	7085184702	270888	HOINEICHONG HAOKIP	0	0	0
89	2018	1	1	9	8132050127	270988	Florence Baite	0	0	0
90	2018	2	2	17	8732845570	931137	Tinkhokim	0	0	0
91	2018	1	1	12	9383359982	931140	Rebecca Kipgen	0	0	0
92	2018	3	3	39	9612890589	270745	TH TONGANLEI	0	0	0
93	2018	3	3	57	9612883589	270748	K TOTHANG	0	0	0
94	2018	1	1	13	8119028759	270982	Lheikhochin Guite	0	0	0
95	2018	12	1	20	8731936192	270845	MARGARET NENGJAHAT BAITE	0	0	0
96	2018	1	1	7	7085970153	271010	Chinkholhing Haokip	0	0	0
97	2018	1	1	14	7085786278	270872	TINGCHA HAOKIP	0	0	0
98	2018	1	1	7	8414012053	270860	T HATKHOLAM	0	0	0
99	2018	2	2	28	8119932717	931144	Ngaineng	0	0	0
101	2018	1	1	3	8730899438	270949	KHUMLO TOYANG JANAL	0	0	0
102	2018	2	2	27	8413967701	270812	KH MALSOMI LAMKANG 	0	0	0
103	2018	1	1	10	9612604592	270874	HATNEIKIM BAITE	0	0	0
100	2018	2	2	23	8414969733	270979	Nemboilhing	0	0	0
105	2018	1	1	13	9436688333	270851	HATNEIKIM	0	0	0
106	2018	3	3	49	8415088017	270751	TONTANG JACY KHOIBU	0	0	0
104	2018	3	3	24	9862246355	271008	Hatneikim Haokip	0	0	0
107	2018	2	2	25	7085348414	270973	Ngaineilam Haokip	0	0	0
108	2018	2	2	36	8258868392	270750	SERTO JULIE KOM	0	0	0
109	2018	1	1	19	8974771042	270758	SUNGNEM ROSEMARY 	0	0	0
110	2018	1	1	34	8014837991	270757	K ACHON CHOTHE	0	0	0
111	2018	2	2	52	8575814117	270754	SK TOMANI LAMKANG 	0	0	0
112	2018	2	2	25	8974973252	270969	Mary Chinneithem Baite	0	0	0
113	2018	1	1	37	8413947935	270760	NENGHOILAM HAOKIP	0	0	0
114	2018	1	1	14	8014000575	270763	KB SOMILA MARING	0	0	0
115	2018	1	1	21	8014622330	270767	KH PEIWAR LAMKANG 	0	0	0
116	2018	1	1	9	8118944649	270756	KH MARTHA 	0	0	0
117	2018	1	1	16	8131939399	270768	D SUMILA LAMKANG 	0	0	0
118	2018	1	1	15	8732848608	270761	H NINGMILA 	0	0	0
119	2018	1	1	14	9612006656	270755	M HEIJINGAMBI	0	0	0
120	2018	1	1	9	8415031601	270873	TLINGJANENG HAOKIP	0	0	0
121	2018	1	1	19	9485260069	270927	CHINGKHOLAM HAOKIP	0	0	0
122	2018	1	1	11	9612883298	270950	Kh Cicilia	0	0	0
123	2018	1	1	4	8974342043	931149	Hoipilhing Haokip	0	0	0
124	2018	1	1	15	8974962949	270865	KT MINAHRING ANAL	0	0	0
125	2018	1	1	6	8730996626	270642	S Chinboi Baite	0	0	0
126	2018	2	2	25	7085457044	270971	Kimboi Baite	0	0	0
127	2018	1	1	11	9612149845	270912	LAMKHOCHONG HAOKIP	0	0	0
128	2018	1	1	0	8118993197	931164	Gracy Lamneikim	0	0	0
129	2018	1	1	19	8974179454	271002	Tinkhochong Lhangal	0	0	0
130	2018	2	2	12	9612135662	931154	Lhingneichong	0	0	0
131	2018	1	1	15	9436684635	270896	KL MAMI ANAL	0	0	0
134	2018	1	1	18	8415907708	270947	RT MARITA	0	0	0
135	2018	1	1	15	9402607502	270885	HL MARCILA	0	0	0
136	2018	1	1	9	9862289344	270909	RT MINSHEL	0	0	0
137	2018	1	1	4	8729822259	270892	MANJU THAPA	0	0	0
138	2018	2	2	4	7085802540	270972	HATNEIKIM HAOKIP	0	0	0
139	2018	1	1	9	8731933024	270905	PY PHERODA	0	0	0
140	2018	1	1	6	9436665445	270906	T LHINGKHONEI HAOKIP	0	0	0
141	2018	1	1	28	9436426023	270918	HOIKHONENG 	0	0	0
142	2018	3	3	29	8415038704	270765	LV TOPEM LAMKANG	0	0	0
143	2018	2	2	8	8974990372	931169	HOIKHONENG BAITE	0	0	0
145	2018	2	2	25	9862619700	931170	HATHOI HAOKIP	0	0	0
146	2018	1	1	6	8413976135	270943	TH TOYING LAMKANG	0	0	0
147	2018	2	2	17	9862637972	270769	TH LEWIS	0	0	0
148	2018	2	2	21	9612044359	931172	NEMKHOILHING 	0	0	0
149	2018	1	1	9	7085523479	270897	NL PHANIHRING ANAL	0	0	0
150	2018	1	1	18	7085435549	931173	NELKHOLHING	0	0	0
151	2018	1	1	16	9612457753	270883	HN MINHWAL	0	0	0
152	2018	2	2	25	8837083400	270766	ST NENGBOY KOM 	0	0	0
153	2018	1	1	6	9402257478	270941	NL JAMHRING	0	0	0
154	2018	1	1	6	9774238268	270867	PASHEL CICILIA ANAL	0	0	0
155	2018	1	1	24	8414874249	270770	T SUNDORI KOM	0	0	0
133	2018	1	2	18	9402968256	270884	HB RODA ANAL	0	0	0
156	2018	1	1	10	9744908582	931184	THENJALHING HAOKIP	0	0	0
132	2018	2	2	16	9402257488	270946	NL MINTHUNG ANAL	0	0	0
157	2018	1	1	22	9862850306	270771	KARUNG RUNGHUNJANG KOM	0	0	0
158	2018	1	1	12	7005340974	931186	THANGNEILAM KHONGSAI	0	0	0
159	2018	1	1	14	8730804472	270777	JS TOHMANHRING ANAL	0	0	0
160	2018	2	2	15	9402755944	931190	CHRISTINA MARY NEMHEILHING	0	0	0
161	2018	3	3	53	7085405412	931192	THANGNEILAM HAOKIP	0	1	0
162	2018	1	1	9	8119806270	931119	SOMICHON VASHINGNAO	0	0	0
163	2018	1	1	13	7085214875	931193	LAMNEITHEM HAOKIP	0	0	0
164	2018	1	1	12	9077374827	270781	LANGHU ASHA	0	0	0
165	2018	1	1	9	7085294315	931196	MERCY HATNEIKIM	0	0	0
166	2018	1	1	11	9378026528	931197	DEIKHONENG HAOKIP	0	0	0
167	2018	1	1	17	8731928063	931179	HB TOHRING 	0	0	0
168	2018	1	1	12	9612753249	931199	HATNEILHING HAOKIP	0	0	0
169	2018	3	3	48	8974611332	270774	KL PESHUNG ANAL	0	0	0
170	2018	1	1	0	7005230477	931205	THEMBOI HAOKIP	0	0	0
171	2018	1	1	14	9612408949	931198	M. VAHNEIKIM HAOKIP	0	0	0
172	2018	2	2	20	8414980732	270776	RD NIHRING ANAL	0	0	0
173	2018	1	1	7	8729864012	931203	HATKHOTING HAOKIP	0	0	0
175	2018	1	1	11	8415090091	270880	RITUN MARIAM ANAL	0	0	0
176	2018	1	1	17	9612143918	270775	NULA SHEMHRING ANAL	0	0	0
174	2018	2	2	26	8415034758	931204	NENGNEIHONG GUITE	0	0	0
177	2018	1	1	6	9436667552	270899	NL SHEEMA ANAL	0	0	0
178	2018	1	1	14	8131034777	270780	HL ROHENI ANAL	0	0	0
179	2018	1	1	12	8731933966	931209	M. CHINNEILHING HAOKIP	10	0	0
180	2018	2	2	16	9402663245	931206	PUMNEILHING	0	0	0
181	2018	1	1	19	9612185831	270772	BONGSHONG SHANTI	0	0	0
182	2018	1	1	11	8974258812	931120	WS SAIDA	0	0	0
183	2018	1	1	5	8413955092	270894	NL KHIHRING	0	0	0
184	2018	1	1	18	8731000521	270779	WL LAMHRING ANAL	0	0	0
185	2018	1	1	9	8131810495	270980	THEMKHONENG 	0	0	0
186	2018	1	1	4	8974888789	270881	MEICHAMLIU K PANMEI	0	0	0
187	2018	2	2	28	8730812554	270793	JV MARY LAMKANG	0	0	0
188	2018	1	1	0	7308390485	931442	MARTHA LINGKHOHOI MATE	0	0	0
189	2018	1	1	10	7629948941	270878	M. HOIKHOCHONG	0	0	0
190	2018	2	2	27	7085117587	270977	NEMKHOLHIDNG HAOKIP	0	0	0
191	2018	1	1	22	9862559364	270850	NIANGHOICHING	0	0	0
192	2018	2	2	20	9612430773	270995	VALJANENG	0	0	0
193	2018	1	1	29	8732012516	270861	CHINKHOLHING	0	0	0
194	2018	1	1	19	9612187299	931122	SHANKHIL MALTHO AMINA LAMKANG	0	0	0
195	2018	1	1	7	8974376087	271009	NENGNEITHEM	0	0	0
196	2018	1	1	34	8414995101	270849	LHINGKHONEM MATE	0	0	0
197	2018	2	2	19	8732049356	270976	TINNU	0	0	0
198	2018	1	1	6	8131000351	270914	CHINNEIKIM	0	0	0
199	2018	3	3	49	8732858050	270786	BS AGNES ANAL	0	0	0
200	2018	2	2	7	8131913286	270975	MARGRET HAOKIP	0	0	0
201	2018	2	2	25	7085223977	270828	LK PENI 	0	0	0
202	2018	2	2	27	8731990207	270952	TELNGOH PAOKHONENG HAOKIP	0	0	0
203	2018	1	1	0	8575448259	931315	M. VAHNEITHEM HAOKIP	0	0	0
204	2018	2	2	32	8119945152	270830	HB KHITUN	0	0	0
205	2018	1	1	0	8131836373	931448	CHINNEILAM HAOKIP	0	0	0
206	2018	1	1	10	8974909865	931300	LAMKHOHOI	0	0	0
207	2018	2	2	23	8787785019	270967	DEIKHONENG HAOKIP	0	0	0
208	2018	1	1	18	8731038141	270829	PS JOLHLUNG	0	0	0
209	2018	1	1	0	8974549578	931299	CHINNEITHEM	0	0	0
210	2018	2	2	6	9862685166	270917	VAHBOI HAOKIP	0	0	0
211	2018	1	1	18	9862044922	270831	KHUMUKCHAM RANIJAOBI DEVI 	0	0	0
212	2018	2	2	34	9856856101	931313	M NGAIKHONENG HAOKIP	0	0	0
213	2018	2	2	33	8413967583	270785	BD HRINGKHAM	0	0	0
214	2018	1	1	7	7085391013	270930	ROSEMARY	0	0	0
215	2018	1	1	10	8259836784	270945	KIMKHOHOI	0	0	0
216	2018	1	1	5	9862086187	270999	NGAIZALAM HAOKIP	0	0	0
217	2018	2	2	17	8729873264	270788	RT KAMNANEMA ANAL	0	0	0
218	2018	3	3	56	8974820456	270921	M HELENA ZOU	0	0	0
219	2018	1	1	19	9436079716	270919	NEINUMCHING	0	0	0
220	2018	1	1	8	7085409609	270931	T LUCY ZOU	0	0	0
221	2018	5	5	63	8414853859	270787	JASHA HRINGTHA ANAL	0	0	0
222	2018	1	1	18	7424085662	270911	HOIKHONENG	0	0	0
223	2018	1	1	11	9402911471	270901	TINKHODIM HAOKIP	0	0	0
224	2018	1	1	22	9862873877	270924	MARGARET HAOKIP	0	0	0
226	2018	1	1	7	9612829515	270847	T ROSEMARY TETE	0	0	0
227	2018	1	1	22	8575244934	270833	CR PENGANSHING MOYON	0	0	0
228	2018	1	1	22	9402258134	270920	HOINEIHAT HAOKIP	0	0	0
229	2018	1	1	16	9402260852	931117	LANGHU JUDIE	0	0	0
225	2018	2	2	33	9402609041	270910	MANGDEILIANCHING ZOU	0	0	0
230	2018	2	2	28	8414829244	270836	KH KAMLA	0	0	0
144	2018	2	2	29	9402962341	270925	LAMKHOCHIN HAOKIP	0	0	0
231	2018	2	2	13	9402877307	270841	SR HRINGLUNG ANAL	0	0	0
232	2018	2	2	24	8974771227	270838	DILBUNG SHOMLENG LAMKANG	0	0	0
233	2018	2	2	33	8729917401	270891	SR TONGAM	0	0	0
234	2018	1	1	3	7085374722	270939	SNG JUNISH	0	0	0
235	2018	1	1	6	8974708304	271012	WS NAISY	0	0	0
237	2018	1	1	33	8731999708	270834	LUKHU RALNIHRING ANAL	0	0	0
238	2018	1	1	15	9436623688	270936	NGAIJAHAT	0	0	0
239	2018	1	1	30	9485211627	270916	LAMNEIKIM HAOKIP	0	0	0
240	2018	2	2	55	8731860828	931243	SK SHOMWAR LAMKANG 	0	0	0
241	2018	1	1	16	8732889927	270837	HL HRANMIL ANAL	0	0	0
242	2018	1	1	9	8731935928	270913	S NENGNEIKIM HAOKIP	0	0	0
243	2018	1	1	24	8259998673	270814	SHANKHIL TOBEM LAMKANG	0	0	0
236	2018	3	3	41	9612568157	270866	DY DONGNAL	0	0	0
244	2018	1	1	23	9612258160	931226	SK TOMANI LAMKANG	0	0	0
245	2018	1	1	32	8259868942	270813	SURTE SHANGTIN LAMKANG	0	0	0
246	2018	1	1	12	8729959632	931227	M CHINKHOHLING HAOKIP	0	0	0
247	2018	2	2	29	9874928006	270815	SHILSI ESTER LAMKANG 	0	0	0
248	2018	1	1	11	8974847979	270816	K TERAM TARAO 	0	0	0
249	2018	1	1	19	8974192415	270818	NG TORONI 	0	0	0
250	2018	1	1	16	7628964897	931181	CR TAMPHANING MOYON	0	0	0
251	2018	1	1	16	7085113573	931174	RD SHANGTHUNG ANAL	0	0	0
252	2018	1	1	35	8413017390	931224	NG AGNES MOYON 	0	0	0
253	2018	4	4	86	8413814754	270819	KH RANIROSE 	0	0	0
254	2018	1	1	15	8731861251	931183	TS DAMTHA ANAL	0	0	0
255	2018	1	1	16	8575367048	270832	WS EVERNI	0	0	0
256	2018	4	1	4	9089744128	931159	Tinkhochin Haokip	0	0	0
257	2018	1	1	15	9612537308	931225	MURPHY THOUMAN	0	0	0
258	2018	1	1	9	8730052043	270839	WS WANNIHRING	0	0	0
259	2018	1	1	6	9612415174	931165	NENGJALHING HAOKIP	0	0	0
260	2018	1	1	4	8132088456	931168	DAISY CHONGNEILAM	0	0	0
261	2018	1	1	23	9436405762	270784	NL SHANGNIHRING ANAL	0	0	0
262	2018	1	1	24	9612455160	270789	PASHEL ELIYA ANAL	0	0	0
263	2018	1	1	18	9597813412	271006	G HELHING HAOKIP	0	0	0
264	2018	1	1	25	8731066429	931126	MAREM THAMBUI	0	0	0
265	2018	1	1	17	7085291576	270986	NENJAHOI HAOKIP	0	0	0
266	2018	2	2	21	9612960896	931141	HATNEILHING GUITE	0	0	0
267	2018	1	1	19	8414851867	270958	NEMKHOTING	0	0	0
268	2018	1	1	0	8119066234	931195	NENGNEICHAM HAOKIP	0	0	0
269	2018	1	1	0	9436287213	931182	T HOIKIM HAOKIP	0	0	0
270	2018	1	1	18	7085436718	931175	LHINGNEICHONG HAOKIP	0	0	0
271	2018	2	2	26	8974898048	931152	HOIKHOCHIN HAOKIP	0	0	0
272	2018	1	1	0	8730805892	931150	NEIHOITHEM BAITE	0	0	0
273	2013	3	9	2	9612294534	270829	4	0	6	2
\.


--
-- Name: connectivityInfras_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."connectivityInfras_id_seq"', 3, true);


--
-- Data for Name: connectivity_infras; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.connectivity_infras (id, approached_road_status, distance_from_appr_road, village_code, reference_year) FROM stdin;
2	N	0.00	270896	2019
3	Y	55.00	931241	2019
\.


--
-- Data for Name: departments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.departments (id, name) FROM stdin;
2	Social Welfare
4	Agriculture
5	Veterinary
6	Family Welfare
7	Fisheries
8	FCS (CAF & PD)
9	Horticulture & Soil Conservation
10	PHED
11	Planning
12	Power
13	PWD
14	DRDA
15	SCERT
16	Sericulture
18	Youth Affairs & Sports
3	Education(S) / ZEO 
1	Medical & Health Services
\.


--
-- Name: departments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.departments_id_seq', 21, true);


--
-- Data for Name: education_infras; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.education_infras (education_infra_id, education_reference_year, total_govt_school, total_adc_school, total_private_school, total_primary_school, total_primary_student, total_jhs, total_jhs_student, total_secondary_school, total_secondary_student, total_hrsec_school, total_hrsec_student, village_code, total_primary_teacher, total_jhs_teacher, total_secondary_teacher, total_hrsec_teacher) FROM stdin;
9	2018	1	0	0	1	15	0	0	0	0	0	0	270937	2	0	0	0
10	2018	1	0	0	1	27	0	0	0	0	0	0	270936	2	0	0	0
11	2018	1	0	0	1	24	1	9	1	0	0	0	270883	15	1	3	0
12	2018	1	0	0	1	26	0	0	0	0	0	0	270938	2	0	0	0
13	2018	1	0	0	1	28	0	0	0	0	0	0	270918	2	0	0	0
14	2018	1	0	0	1	121	1	122	1	70	0	0	270886	29	4	4	0
15	2018	1	0	0	1	44	0	0	0	0	0	0	270882	3	0	0	0
16	2018	1	0	0	1	21	0	0	0	0	0	0	270868	4	0	0	0
17	2018	1	0	0	1	31	0	0	0	0	0	0	271011	3	0	0	0
18	2018	1	0	0	1	13	0	0	0	0	0	0	270930	3	0	0	0
19	2018	1	0	0	1	21	0	0	0	0	0	0	270927	0	0	0	0
20	2018	1	0	0	1	67	0	0	0	0	0	0	270931	4	0	0	0
21	2018	1	0	0	1	33	0	0	0	0	0	0	270941	2	0	0	0
22	2018	1	0	0	1	42	0	0	0	0	0	0	270925	4	0	0	0
23	2018	1	0	0	1	22	0	0	0	0	0	0	270914	3	0	0	0
24	2018	1	0	0	1	47	0	0	0	0	0	0	270919	1	0	0	0
25	2018	1	0	0	1	18	0	0	0	0	0	0	270879	1	0	0	0
26	2018	1	0	0	1	83	0	0	0	0	0	0	270996	4	0	0	0
27	2018	1	0	0	1	26	0	0	0	0	0	0	270849	2	0	0	0
28	2018	1	0	0	1	196	1	60	0	0	0	0	270921	12	5	0	0
29	2018	1	0	0	1	46	1	0	0	0	0	0	270851	5	3	0	0
30	2018	1	0	0	1	27	0	0	0	0	0	0	270912	2	0	0	0
31	2018	1	0	0	1	26	0	0	0	0	0	0	270877	0	0	0	0
32	2018	1	0	0	1	35	0	0	0	0	0	0	270959	2	0	0	0
33	2018	1	0	0	1	53	1	45	1	30	0	0	270866	14	0	4	0
34	2018	1	0	0	1	38	0	0	0	0	0	0	270989	2	0	0	0
35	2018	1	0	0	1	21	0	0	0	0	0	0	270998	2	0	0	0
36	2018	1	0	0	1	66	1	23	1	44	0	0	270870	14	0	3	0
37	2018	1	0	0	1	23	0	0	0	0	0	0	270784	3	0	0	0
38	2018	1	0	0	1	21	0	0	0	0	0	0	270772	4	0	0	0
39	2018	1	0	0	1	27	0	0	0	0	0	0	931094	2	0	0	0
40	2018	1	0	0	1	22	0	0	0	0	0	0	931227	3	0	0	0
41	2018	1	0	0	1	18	0	0	0	0	0	0	270789	5	0	0	0
42	2018	1	0	0	1	22	0	0	0	0	0	0	931122	0	0	0	0
43	2018	1	0	0	1	23	0	0	0	0	0	0	270794	3	0	0	0
44	2018	1	0	0	1	28	0	0	0	0	0	0	270800	2	0	0	0
45	2018	1	0	0	1	20	0	0	0	0	0	0	931230	3	0	0	0
47	2018	1	0	0	1	23	0	0	0	0	0	0	270773	2	0	0	0
48	2018	1	0	0	1	15	0	0	0	0	0	0	270762	2	0	0	0
49	2018	1	0	0	1	26	0	0	0	0	0	0	270763	1	0	0	0
50	2018	1	0	0	1	29	0	0	0	0	0	0	931166	4	0	0	0
51	2018	1	0	0	1	25	0	0	0	0	0	0	931181	0	0	0	0
52	2018	0	0	0	1	53	1	2	1	7	0	0	270834	11	0	5	0
53	2018	1	0	0	1	40	1	17	1	0	0	0	270765	15	0	4	0
54	2018	1	0	0	1	8	0	0	0	0	0	0	270809	1	0	0	0
55	2018	1	0	0	1	23	0	0	0	0	0	0	270839	2	0	0	0
56	2018	1	0	0	1	0	1	14	1	140	0	0	270804	20	0	10	0
57	2018	1	0	0	1	35	0	0	0	0	0	0	270798	2	0	0	0
58	2018	1	0	0	1	23	0	0	0	0	0	0	931106	1	0	0	0
59	2018	1	0	0	1	0	1	14	1	148	0	0	270825	45	0	11	0
60	2018	1	0	0	0	0	0	0	0	0	0	0	270824	0	0	0	0
61	2018	7	0	0	0	0	0	0	0	0	0	0	931129	0	0	0	0
62	2018	1	0	0	1	44	0	0	0	0	0	0	270820	2	0	0	0
63	2018	1	0	0	1	25	0	0	0	0	0	0	270761	2	0	0	0
64	2018	1	0	0	1	30	0	0	0	0	0	0	270802	2	0	0	0
65	2018	1	0	0	1	31	0	0	0	0	0	0	270778	2	0	0	0
66	2018	1	0	0	1	19	0	0	0	0	0	0	270831	2	0	0	0
67	2018	1	0	0	1	23	0	0	0	0	0	0	270796	2	0	0	0
68	2018	1	0	0	1	21	1	7	0	0	0	0	270751	15	1	0	0
69	2018	1	0	0	1	22	0	0	0	0	0	0	931224	4	0	0	0
70	2018	1	0	0	1	24	0	0	0	0	0	0	931183	1	0	0	0
71	2018	1	0	0	1	17	0	0	0	0	0	0	931108	1	0	0	0
72	2018	1	0	0	1	18	0	0	0	0	0	0	270678	3	0	0	0
73	2018	1	0	0	1	19	0	0	0	0	0	0	270978	3	0	0	0
74	2018	1	0	0	1	24	0	0	0	0	0	0	270968	2	0	0	0
75	2018	1	0	0	1	13	0	0	0	0	0	0	270972	0	0	0	0
76	2018	1	0	0	1	51	0	0	1	58	0	0	931192	10	0	5	0
77	2018	1	0	0	1	51	0	0	0	0	0	0	931193	10	0	0	0
78	2018	1	0	0	1	0	0	0	0	0	0	0	931194	2	0	0	0
79	2018	1	0	0	1	31	0	0	0	0	0	0	270971	3	0	0	0
80	2018	1	0	0	0	0	0	0	0	0	0	0	270980	4	0	0	0
81	2018	1	0	0	1	20	0	0	0	0	0	0	931206	0	0	0	0
82	2018	1	0	0	1	17	0	0	0	0	0	0	270976	3	0	0	0
83	2018	1	0	0	1	20	0	0	0	0	0	0	270975	1	0	0	0
84	2018	1	0	0	1	48	0	0	0	0	0	0	270986	0	0	0	0
85	2018	1	0	0	1	25	0	0	0	0	0	0	931175	2	0	0	0
46	2018	1	0	0	1	80	1	15	1	0	0	0	931105	11	4	1	0
\.


--
-- Data for Name: fileuploads; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.fileuploads (id, user_name) FROM stdin;
14	dfdfd
\.


--
-- Name: fileuploads_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.fileuploads_id_seq', 14, true);


--
-- Data for Name: food_securities; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.food_securities (food_security_id, total_aay_members, total_phh_members, total_aadhaar_seeded_card, total_fair_price_shop, village_code, reference_year, total_aay_card, total_phh_card, fair_price_shop_name) FROM stdin;
38	0	15	0	0	270871	2018	0	3	0
64	30	221	0	0	270897	2018	9	71	0
73	2	85	0	0	270908	2018	1	23	0
33	63	297	0	0	270866	2018	22	105	Nungpan/Hb Evermine Anal
35	57	109	0	0	270868	2018	10	24	Nungpan/Hb Evermine Anal
75	12	214	0	0	270910	2018	4	55	Teiyang/Lunkhomang Touthang
84	4	142	0	0	270920	2018	2	33	Teiyang/Lunkhomang Touthang
83	34	67	0	0	270919	2018	17	30	Teiyang/Lunkhomang Touthang
40	0	132	0	0	270873	2018	0	33	Y.Thingkangphai/Hemjalun Haokip
37	25	150	0	0	270870	2018	6	37	Y.Thingkangphai/Hemjalun Haokip
44	24	38	0	0	270877	2018	7	13	Y.Thingkangphai/Hemjalun Haokip
41	16	108	0	0	270874	2018	3	24	Y.Thingkangphai/Hemjalun Haokip
42	10	23	0	0	270875	2018	5	11	Y.Thingkangphai/Hemjalun Haokip
43	26	37	0	0	270876	2018	5	8	Y.Thingkangphai/Hemjalun Haokip
118	0	56	0	0	270965	2018	0	18	T.Monglen/Lunkhothong Touthang
17	23	383	0	0	270847	2018	6	83	Haomuanlian
25	4	42	0	0	270856	2018	1	14	Mombi/ Hoikhoneng Haokip
108	0	13	0	0	270949	2018	0	3	Bs. Lalhlung Anal
53	44	496	0	0	270886	2018	15	155	Bs. Lalhlung Anal
57	2	24	0	0	270890	2018	1	8	Bs. Lalhlung Anal
56	11	35	0	0	270889	2018	3	12	Bs. Lalhlung Anal
104	12	106	0	0	270944	2018	4	30	Sr. Maria Hringni
51	2	64	0	0	270884	2018	1	22	Sr. Maria Hringni
60	7	21	0	0	270893	2018	2	6	Nula Roel
59	0	36	0	0	270892	2018	0	11	Nula Roel
61	75	548	0	0	270894	2018	22	176	Nula Roel
19	9	110	0	0	270849	2018	2	20	Ngamkhopao Baite
24	15	131	0	0	270855	2018	6	38	Ngamkhopao Baite
28	43	197	0	0	270861	2018	10	43	Ngamkhopao Baite
27	0	4	0	0	270860	2018	0	2	Ngamkhopao Baite
15	32	640	0	0	270845	2018	8	152	Ngamkhopao Baite
13	4	61	0	0	270842	2018	2	20	Haomuanlian
18	0	18	0	0	270848	2018	0	6	Haomuanlian
14	7	227	0	0	270844	2018	2	55	Haomuanlian
23	23	103	0	0	270853	2018	4	25	Haomuanlian
16	16	175	0	0	270846	2018	5	47	Haomuanlian
21	19	142	0	0	270851	2018	9	46	Haomuanlian
22	2	98	0	0	270852	2018	1	30	Haomuanlian
63	8	77	0	0	270896	2018	2	19	Wangshol Shanghmanhring
58	25	114	0	0	270891	2018	8	41	Wangshol Shanghmanhring
65	7	40	0	0	270898	2018	2	14	Wangshol Shanghmanhring
69	4	48	0	0	270903	2018	1	15	Hl. Thungam Anal
72	4	144	0	0	270907	2018	1	41	T.Panam
70	0	44	0	0	270904	2018	0	14	T.Panam
107	14	34	0	0	270948	2018	6	12	T.Panam
100	7	12	0	0	270939	2018	2	4	T.Panam
76	0	197	0	0	270911	2018	0	49	Paokhosei
68	2	77	0	0	270901	2018	1	17	Paokhosei
71	4	8	0	0	270906	2018	2	4	Paokhosei
80	0	22	0	0	270915	2018	0	6	Paokhosei
79	0	34	0	0	270914	2018	0	8	Paokhosei
77	0	15	0	0	270912	2018	0	5	Paokhosei
46	11	44	0	0	270879	2018	3	13	Paokhosei
67	0	165	0	0	270900	2018	0	42	Paokhosei
91	6	99	0	0	270928	2018	1	23	Paokhosei
101	0	16	0	0	270940	2018	0	4	Rd.Thumdang
74	24	127	0	0	270909	2018	8	35	Rd.Thumdang
66	0	10	0	0	270899	2018	0	4	Hl. Thungam Anal
102	20	219	0	0	270941	2018	6	63	Hl. Thungam Anal
105	80	242	0	0	270946	2018	27	95	Hranglim Lungam Anal
48	0	9	0	0	270881	2018	0	2	Hranglim Lungam Anal
95	17	127	0	0	270933	2018	5	35	Liansuanmang zoute
88	5	81	0	0	270924	2018	2	22	Liansuanmang zoute
82	13	64	0	0	270918	2018	4	16	Liansuanmang zoute
30	6	51	0	0	270863	2018	3	21	Liansuanmang zoute
87	0	73	0	0	270923	2018	0	17	Nehkholet Haokip
89	24	107	0	0	270925	2018	4	25	Nehkholet Haokip
26	0	27	0	0	270857	2018	0	12	Nehkholet Haokip
94	2	18	0	0	270931	2018	1	6	Thangkhogin Haokip
93	0	19	0	0	270930	2018	0	5	Thangkhogin Haokip
96	0	57	0	0	270935	2018	0	13	Thangkhogin Haokip
98	0	200	0	0	270937	2018	0	39	Thangkhogin Haokip
90	0	49	0	0	270927	2018	0	11	Thangkhogin Haokip
92	0	27	0	0	270929	2018	0	6	Thangkhogin Haokip
49	48	193	0	0	270882	2018	15	55	Bs Noresh
50	54	164	0	0	270883	2018	11	40	Bs Noresh
54	5	38	0	0	270887	2018	1	10	Bs Noresh
110	8	172	0	0	270953	2018	2	32	Jangsei Manchong
109	6	109	0	0	270951	2018	3	45	Jangsei Manchong
114	0	161	0	0	270957	2018	0	39	Mangvung Jangkhothang Haokip
112	40	352	0	0	270955	2018	6	68	Jamkhothang Haokip
113	0	155	0	0	270956	2018	0	29	Jamkhothang Haokip
115	3	423	0	0	270959	2018	1	74	Tongminlen Guite
117	0	45	0	0	270964	2018	0	14	Tongminlen Guite
32	26	325	0	0	270865	2018	6	66	HB. EVERMINE ANAL
132	8	85	0	0	271007	2018	2	23	0
34	34	297	0	0	270867	2018	12	104	Nungpan/Hb Evermine Anal
131	13	36	0	0	271012	2018	3	10	Nungpan/Hb Evermine Anal
45	0	19	0	0	270878	2018	0	5	Teiyang/Lunkhomang Touthang
81	0	113	0	0	270916	2018	0	19	Teiyang/Lunkhomang Touthang
36	7	56	0	0	270869	2018	2	17	Y.Thingkangphai/Hemjalun Haokip
39	9	13	0	0	270872	2018	2	5	Y.Thingkangphai/Hemjalun Haokip
142	6	117	0	0	270966	2018	3	31	T.Monglen/Lunkhothong Touthang
144	0	24	0	0	270968	2018	0	11	T.Monglen/Lunkhothong Touthang
141	0	255	0	0	270962	2018	0	68	T.Monglen/Lunkhothong Touthang
157	6	191	0	0	270982	2018	2	66	Joupi/Peter Jamkhosei Khongsai
120	5	115	0	0	270983	2018	1	29	Joupi/Peter Jamkhosei Khongsai
155	0	145	0	0	270980	2018	0	50	Joupi/Peter Jamkhosei Khongsai
156	0	53	0	0	270981	2018	0	13	Joupi/Peter Jamkhosei Khongsai
161	4	23	0	0	270988	2018	1	9	Hollenjang/Letkholal Haokip
160	0	84	0	0	270987	2018	0	28	Hollenjang/Letkholal Haokip
122	0	163	0	0	270989	2018	0	34	Hollenjang/Letkholal Haokip
162	0	61	0	0	270992	2018	0	19	Hollenjang/Letkholal Haokip
159	77	225	0	0	270986	2018	36	55	Hollenjang/Letkholal Haokip
124	4	214	0	0	270993	2018	1	48	Aibol Joupi/Lunkhomang Haokip
136	13	111	0	0	270945	2018	3	21	Aibol Joupi/Lunkhomang Haokip
163	0	305	0	0	270995	2018	0	47	Sehlon/Sonkhomang Mate
127	42	38	0	0	270997	2018	14	12	New Wayang/Anthony Tongkhai Haokip
31	0	16	0	0	270864	2018	0	8	New Wayang/Anthony Tongkhai Haokip
128	0	17	0	0	270998	2018	0	6	New Wayang/Anthony Tongkhai Haokip
126	0	80	0	0	270996	2018	0	15	New Wayang/Anthony Tongkhai Haokip
164	3	72	0	0	270999	2018	1	18	Toitung/Lalcha Touthang
165	0	73	0	0	931125	2018	0	24	Aibol Jamkhomang/Jamkhosat Haokip
167	149	668	0	0	271006	2018	23	102	Molcham/T. Tongkhoson Haokip
168	48	365	0	0	271008	2018	9	62	Molcham/T. Tongkhoson Haokip
170	29	16	0	0	271010	2018	5	2	Molcham/T. Tongkhoson Haokip
169	0	30	0	0	271009	2018	0	10	Molcham/T. Tongkhoson Haokip
133	18	416	0	0	271004	2018	5	118	New Somtal/Mangkholen Haokip
129	4	44	0	0	271003	2018	2	17	New Somtal/Mangkholen Haokip
166	0	32	0	0	271005	2018	0	5	New Somtal/Mangkholen Haokip
119	7	493	0	0	270970	2018	3	86	Yangoulen/Thangkholun Haokip
145	10	133	0	0	270969	2018	5	50	Yangoulen/Thangkholun Haokip
143	0	199	0	0	270967	2018	0	39	Yangoulen/Thangkholun Haokip
121	0	95	0	0	270984	2018	0	24	Mombi/ Hoikhoneng Haokip
158	10	331	0	0	270985	2018	1	47	Mombi/ Hoikhoneng Haokip
150	0	70	0	0	270975	2018	0	13	Songdop/Bosco Thangpao Baite
146	0	149	0	0	270971	2018	0	29	Songdop/Bosco Thangpao Baite
147	3	99	0	0	270972	2018	1	28	Songdop/Bosco Thangpao Baite
152	0	229	0	0	270977	2018	0	44	Sehao/Seikhomang Haokip
148	38	1067	0	0	270973	2018	8	255	Khengjoy/Thangpao Haokip
151	0	119	0	0	270976	2018	0	20	Khengjoy/Thangpao Haokip
149	2	101	0	0	270974	2018	1	20	Khengjoy/Thangpao Haokip
171	0	360	0	0	270797	2018	8	78	Th Kowar Monsang
172	0	221	0	0	270799	2018	0	46	Th Kowar Monsang
173	0	65	0	0	270798	2018	4	12	Th Kowar Monsang
52	31	184	0	0	270885	2018	9	62	Bs. Lalhlung Anal
174	0	53	0	0	270753	2018	0	13	TH. KOWAR MONSANG
130	0	19	0	0	271011	2018	0	6	Sr. Maria Hringni
62	0	8	0	0	270895	2018	0	3	Sr. Maria Hringni
175	0	82	0	0	270803	2018	2	24	MK WANGHRING CHOTHE
176	0	556	0	0	270801	2018	13	147	MK WANGHRING CHOTHE
29	4	72	0	0	270862	2018	1	19	Ngamkhopao Baite
20	6	152	0	0	270850	2018	2	48	Ngamkhopao Baite
177	0	102	0	0	270802	2018	4	34	M K WAHRING CHOTHE
178	0	189	0	0	270800	2018	12	46	M K WAHRING CHOTHE
179	0	186	0	0	270810	2018	6	45	K. KANTING LAMKANG
180	0	253	0	0	270808	2018	3	50	K. KANTING LAMKANG
181	0	269	0	0	270811	2018	0	67	K. KANTING LAMKANG
182	0	250	0	0	270809	2018	7	77	K. KANTING LAMKANG
183	0	352	0	0	270833	2018	8	87	CH. JULISH
185	0	77	0	0	270839	2018	10	19	KC. ANANJOY ANAL
184	0	474	0	0	270837	2018	23	115	KC. ANANJOY ANAL
47	41	514	0	0	270880	2018	16	148	Runlel David
186	0	82	0	0	270836	2018	4	41	SK. BENONG LAMKANG
187	0	335	0	0	270838	2018	10	64	SK. BENONG LAMKANG
188	0	120	0	0	270793	2018	0	39	PASHEL YUMAS ANAL
189	0	108	410	0	270787	2018	27	0	TS SHIMREICHON LANGHU
190	0	94	0	0	270784	2018	0	22	TS SHIMREICHON LANGHU
191	0	141	0	0	270785	2018	12	34	TS SHIMREICHON LANGHU
138	18	59	0	0	270952	2018	4	13	Jangsei Manchong
137	5	108	0	0	270950	2018	2	23	Jangsei Manchong
154	0	188	0	0	270979	2018	0	60	Mangvung Jangkhothang Haokip
139	6	74	0	0	270958	2018	3	23	Mangvung Jangkhothang Haokip
140	0	155	0	0	270961	2018	0	22	Tongminlen Guite
192	0	25	0	0	270783	2018	3	8	TS SHIMREICHON LANGHU
193	0	93	0	0	270788	2018	0	27	TS SHIMREICHON LANGHU
194	0	198	0	0	270786	2018	10	59	TS SHIMREICHON LANGHU
195	0	29	0	0	270782	2018	0	9	TS SHIMREICHON LANGHU
196	0	516	0	0	270813	2018	4	117	THOLUNG YAINAO LAMKANG
197	0	224	0	0	270817	2018	1	58	THOLUNG YAINAO LAMKANG
198	0	110	0	0	270814	2018	0	29	THOLUNG YAINAO LAMKANG
199	0	19	0	0	270812	2018	0	7	THOLUNG YAINAO LAMKANG
200	0	166	0	0	270816	2018	0	42	KH. THOMAS TARAO
201	0	199	0	0	270815	2018	4	48	KH. THOMAS TARAO
202	0	218	0	0	270765	2018	6	49	SK. DANIEL LAMKANG
203	0	374	0	0	270760	2018	2	115	SK. DANIEL LAMKANG
204	0	52	0	0	270762	2018	0	13	SK. DANIEL LAMKANG
205	0	202	0	0	270763	2018	8	46	SK. DANIEL LAMKANG
206	0	80	0	0	270759	2018	1	31	SK. DANIEL LAMKANG
207	0	1651	0	0	931105	2018	50	377	NG. JOYCHANDRA MONSANG
208	0	0	0	0	270825	2018	1	0	SR. NGAMTHA
209	0	140	0	0	270824	2018	0	28	SR. NGAMTHA
210	0	114	0	0	270822	2018	4	31	ROLLY NONGAM
211	0	222	0	0	931111	2018	9	50	ROLLY HONGAM
99	0	29	0	0	270938	2018	0	14	T.Panam
212	0	180	0	0	270764	2018	8	37	ROLLY HONGAM
213	0	184	0	0	270795	2018	3	39	ROLLY HONGAM
214	0	513	0	0	270819	2018	14	116	NG.ANDISION MONSANG
215	0	108	0	0	270818	2018	6	34	NG.ANDISION MONSANG
78	0	8	0	0	270913	2018	0	2	Paokhosei
216	0	877	0	0	270826	2018	26	225	SR. CHANAKA
217	0	169	0	0	270792	2018	3	37	SR. CHANAKA
218	0	59	0	0	270791	2018	0	19	SR. CHANAKA
219	0	847	0	0	270827	2018	22	159	KH. SIYEN LAMKANG
220	0	374	0	0	270820	2018	6	72	KH. SIYEN LAMKANG
103	101	202	0	0	270943	2018	22	52	Rd.Thumdang
135	0	86	0	0	270942	2018	0	17	Hl. Thungam Anal
106	8	79	0	0	270947	2018	3	27	Hranglim Lungam Anal
85	51	220	0	0	270921	2018	14	69	Liansuanmang zoute
221	0	65	0	0	270756	2018	1	25	THOLUNG ANGTHUNG LAMKANG
222	0	135	0	0	270758	2018	1	33	THOLUNG ANGTHUNG LAMKANG
223	0	193	0	0	270754	2018	3	51	THOLUNG ANGTHUNG LAMKANG
224	0	278	0	0	270757	2018	0	57	THOLUNG ANGTHUNG LAMKANG
225	0	138	0	0	270752	2018	0	38	THOLUNG ANGTHUNG LAMKANG
226	0	164	0	0	270755	2018	7	35	THOLUNG ANGTHUNG LAMKANG
227	0	113	0	0	270766	2018	0	32	LV. EDWARDBUNGSHEL LAMKANG
228	0	121	0	0	270768	2018	1	30	LV. EDWARDBUNGSHEL LAMKANG
229	0	205	0	0	270767	2018	5	40	LV. EDWARD BUNGSHEL LAMKANG
230	0	196	0	0	270769	2018	0	37	LV. EDWARD BUNGSHEL LAMKANG
231	0	251	0	0	270771	2018	7	44	LV. EDWARD BUNGSHEL LAMKANG
232	0	125	0	0	270770	2018	4	30	LV. EDWARD BUNGSHEL LAMKANG
233	0	513	0	0	270748	2018	2	138	MD. MORUNG MARING
234	0	401	0	0	270745	2018	7	90	MD. MORUNG MARING
235	0	195	0	0	270744	2018	9	49	MD. MORUNG MARING
236	0	220	0	0	270751	2018	10	62	MD. MORUNG MARING
86	2	33	0	0	270922	2018	1	13	Nehkholet Haokip
237	0	128	0	0	270750	2018	3	31	MD. MORUNG MARING
97	0	31	0	0	270936	2018	0	9	Thangkhogin Haokip
239	0	78	0	0	270772	2018	6	19	SR. RATAN ANAL
55	5	59	0	0	270888	2018	1	17	Thangkhogin Haokip
240	0	84	0	0	270775	2018	1	21	SR. RATAN ANAL
134	0	17	0	0	270917	2018	0	4	Thangkhogin Haokip
241	0	13	0	0	270781	2018	0	4	SR. RATAN ANAL
242	0	251	0	0	270776	2018	0	57	ST. VOLHRING ANAL
243	0	58	0	0	270777	2018	0	13	ST. VOLHRING ANAL
244	0	114	0	0	270780	2018	3	37	ST. VOLHRING ANAL
245	0	37	0	0	270779	2018	1	18	ST. VOLHRING ANAL
111	0	184	0	0	270954	2018	0	35	Jangsei Manchong
246	0	354	0	0	270747	2018	6	94	NG. BENSON MOYON
247	0	636	0	0	270805	2018	1	151	NG. BENSON MOYON
248	0	85	0	0	270746	2018	0	30	NG. BENSON MOYON
153	0	80	0	0	270978	2018	0	24	Mangvung Jangkhothang Haokip
249	0	190	0	0	270749	2018	0	41	NG. BENSON MOYON
250	0	324	0	0	270804	2018	10	71	NG. BENSON MOYON
251	0	308	0	0	270806	2018	3	71	NG. BENSON MOYON
116	8	201	0	0	270960	2018	4	41	Tongminlen Guite
252	0	264	0	0	270807	2018	30	55	NG. BENSON MOYON
253	0	137	0	0	270832	2018	8	30	HT. THUWNHRING
254	0	80	0	0	270831	2018	0	22	HT. THUWNHRING
255	0	80	0	0	270829	2018	8	22	HT. THUWNHRING
256	0	72	0	0	270828	2018	6	23	HT. THUWNHRING
238	0	347	0	0	270774	2018	5	76	SR. RATAN ANAL
257	4	9	0	1	270883	2017	4	5	sdfdf
\.


--
-- Data for Name: formcategories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.formcategories (id, name) FROM stdin;
1	Anganwadi
2	CAF&PD
3	Education Infra
4	Election
5	Health Infra
6	NERCORMP(Demography)
7	NREGA
8	NSAPS
9	SDO Report(Demography)
10	Schemes
11	Security Report(Demography)
\.


--
-- Name: formcategories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.formcategories_id_seq', 11, true);


--
-- Data for Name: health_infras; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.health_infras (health_infra_id, health_reference_year, no_of_doctors, no_of_anm, no_of_staff_nurse, no_of_asha, asha_mobile, village_code, name_of_health_centre) FROM stdin;
13	2018	0	1	0	1	8415984221	270829	Anal Khullen PHSC
14	2018	0	1	0	1	9862619969	270828	Anal Khullen PHSC
15	2018	0	0	0	1	8415991469	270830	Anal Khullen PHSC
16	2018	0	0	0	1	8413026293	270832	Anal Khullen PHSC
17	2018	0	0	0	1	9402415389	270831	Anal Khullen PHSC
18	2018	0	1	0	1	9862115480	931221	Komlathabi PHC
19	2018	0	1	0	1	8119087699	931219	Komlathabi PHC
20	2018	0	0	0	1	8119045834	270800	Komlathabi PHC
21	2018	0	0	0	1	8732851242	931230	Komlathabi PHC
22	2018	0	0	0	1	7629931791	931113	0
23	2018	0	0	0	1	9862124720	270814	Komlathabi PHC
24	2018	0	0	0	1	8974613190	931226	Komlathabi PHC
25	2018	0	0	0	1	9612539900	270809	Komlathabi PHC
26	2018	0	0	0	1	7629931954	270804	Komlathabi PHC
27	2018	0	0	0	1	8259880976	270802	Komlathabi PHC
28	2018	0	0	0	1	9612682844	270803	Komlathabi PHC
29	2018	0	0	0	1	9612496393	270806	Komlathabi PHC
30	2018	0	0	0	1	8014268285	270807	Komlathabi PHC
31	2018	0	0	0	1	9612985474	270801	Komlathabi PHC
32	2018	0	0	0	1	9862701943	931094	Komlathabi PHC
33	2018	0	0	0	1	8415042911	270797	Komlathabi PHC
34	2018	0	0	0	1	8730987312	270799	Komlathabi PHC
35	2018	0	0	0	1	8732032324	270798	Komlathabi PHC
36	2018	0	0	0	1	9612505506	931231	Komlathabi PHC
37	2018	0	0	0	1	8119052277	270796	Komlathabi PHC
38	2018	0	0	0	1	9862073045	931232	Komlathabi PHC
39	2018	0	0	0	1	9612494973	931189	Komlathabi PHC
40	2018	0	0	0	1	8974967776	931229	Komlathabi PHC
41	2018	0	0	0	1	9612290139	270808	Komlathabi PHC
42	2018	0	1	0	1	8731862030	270841	Larong PHSC
43	2018	0	1	0	1	9612874538	270834	Larong PHSC
44	2018	0	1	0	1	9862035745	931243	Larong PHSC
45	2018	0	0	0	1	9402046793	270839	Larong PHSC
46	2018	0	0	0	1	8732855129	931117	Larong PHSC
47	2018	0	0	0	1	9856666666	270837	Larong PHSC
48	2018	0	1	0	1	8575774534	270760	LEINGANGCHING PHSC
49	2018	0	1	0	1	7629078766	270763	LEINGANGCHING PHSC
50	2018	0	0	0	1	8014894124	270762	LEINGANGCHING PHSC
51	2018	0	0	0	1	8413048467	270767	LEINGANGCHING PHSC
52	2018	0	0	0	1	9612883894	270768	LEINGANGCHING PHSC
53	2018	0	0	0	1	8416008521	270765	LEINGANGCHING PHSC
54	2018	0	0	0	1	8730814440	270766	LEINGANGCHING PHSC
55	2018	0	0	0	1	9862823517	270761	LEINGANGCHING PHSC
56	2018	0	0	0	1	7085787473	270769	LEINGANGCHING PHSC
57	2018	0	0	0	1	9615870866	270759	LEINGANGCHING PHSC
58	2018	0	0	0	1	9612444061	270771	LEINGANGCHING PHSC
59	2018	0	0	0	1	8974312266	931183	Paraolon PHSC
60	2018	0	0	0	1	9612449164	270838	PARAOLON PHSC
61	2018	0	0	0	1	8732854356	270836	PARAOLON PHSC
62	2018	0	1	0	1	8974170964	270757	Purum Tampak PHSC
63	2018	0	1	0	1	9615887088	270756	Purum Tampak PHSC
64	2018	0	0	0	1	9856112769	270758	Purum Tampak PHSC
65	2018	0	0	0	1	9615735464	270750	Purum Tampak PHSC
66	2018	0	0	0	1	9856435668	931114	Purum Tampak PHSC
67	2018	0	0	0	1	8729956864	270752	Purum Tampak PHSC
68	2018	0	0	0	1	8575989914	270754	Purum Tampak PHSC
69	2018	0	0	0	1	9612006819	270751	Purum Tampak PHSC
70	2018	0	1	0	1	8414854824	270813	Tarao Lamanai PHSC
71	2018	0	1	0	1	9402047720	270815	Tarao Lamanai PHSC
72	2018	0	0	0	1	9862591579	270810	Tarao Lamanai PHSC
73	2018	0	0	0	1	7085702021	270816	Tarao Lamanai PHSC
74	2018	0	1	0	1	9612445296	931120	Unopat PHSC
75	2018	0	0	0	1	8732883881	270780	Unopat PHSC
76	2018	0	0	0	1	9612338942	270772	Unopat PHSC
77	2018	0	0	0	1	8731930961	270776	Unopat PHSC
78	2018	0	0	0	1	9862101667	931179	Unopat PHSC
79	2018	0	0	0	1	8131819765	270779	Unopat PHSC
80	2018	0	0	0	1	8119087205	270777	Unopat PHSC
81	2018	0	0	0	1	8131819168	270781	Unopat PHSC
82	2018	0	0	0	1	9612503077	931119	Unopat PHSC
83	2018	0	0	0	1	8731850142	270774	Unopat PHSC
84	2018	0	1	0	1	8787731163	270748	Khudei Khunou PHSC
85	2018	0	0	0	1	9862541156	270749	Khudei Khunou PHSC
86	2018	0	0	0	1	8974604304	270747	Khudei Khunou PHSC
87	2018	0	0	0	1	9856830299	270745	Khudei Khunou PHSC
88	2018	0	0	0	1	9402054159	270746	Khudei Khunou PHSC
89	2018	0	0	0	1	8974846007	931222	Khudei Khunou PHSC
90	2018	0	1	0	0	9612068974	270833	DH
91	2018	0	1	0	1	8575244775	270791	DH
92	2018	0	1	0	1	9612470673	270827	DH
93	2018	0	0	0	1	9612605954	931129	DH
94	2018	0	0	0	1	8414072618	270820	DH
95	2018	0	0	0	1	8415856156	270818	DH
96	2018	0	0	0	1	9402046374	270819	DH
97	2018	0	0	0	1	9612181863	931185	DH
98	2018	0	0	0	1	8731861228	931174	DH
99	2018	0	0	0	1	9436095128	931158	DH
100	2018	0	0	0	1	8729954624	931224	DH
101	2018	0	0	0	1	8132904019	270792	DH
102	2018	0	0	0	1	9612471645	270795	DH
103	2018	0	0	0	1	9612450591	270787	DH
104	2018	0	0	0	1	7085411681	270788	DH
105	2018	0	0	0	1	9402047196	270789	DH
106	2018	0	0	0	1	8974962935	931122	DH
107	2018	0	0	0	1	9436207346	270793	DH
108	2018	0	0	0	1	8415099608	270794	DH
109	2018	0	0	0	1	9862878159	931097	DH
110	2018	0	0	0	1	8131820601	931171	DH
111	2018	0	0	0	1	8131819357	270835	DH
112	2018	0	0	0	1	8974769586	931138	DH
113	2018	0	0	0	1	8413863660	270790	DH
114	2018	0	0	0	1	8119943013	931130	DH
115	2018	0	0	0	1	9615324525	931162	DH
116	2018	0	0	0	1	8131028884	270826	DH
117	2018	0	0	0	1	8413045283	931161	DH
118	2018	0	0	0	1	9612485804	931135	DH
119	2018	0	0	0	1	9436272369	931163	DH
120	2018	0	0	0	1	8131912966	931111	DH
121	2018	0	0	0	1	9862973324	931126	DH
122	2018	0	0	0	1	9436871950	270784	DH
123	2018	0	0	0	1	8974337534	270786	DH
124	2018	0	0	0	1	9612035899	270785	DH
125	2018	0	0	0	1	8730814075	270862	CHC-SC
126	2018	0	0	0	1	8414876176	270861	CHC-SC
127	2018	0	0	0	1	8729992456	270850	CHC-SC
128	2018	0	0	0	1	8413807929	270849	CHC-SC
129	2018	0	0	0	1	9856944824	270851	CHC-SC
130	2018	0	0	0	1	8974662777	270915	CHC-SC
131	2018	0	0	0	1	9862237332	270848	CHC-SC
132	2018	0	0	0	1	8413979226	270873	CHC-SC
133	2018	0	0	0	2	8119910223	270866	CHC-SC
134	2018	0	0	0	1	8729992457	270869	CHC-SC
135	2018	0	0	0	1	8974308464	270853	CHC-SC
136	2018	0	0	0	1	8413843687	270846	CHC-SC
137	2018	0	0	0	1	8729965688	270842	CHC-SC
138	2018	0	0	0	1	7985249988	270845	CHC-SC
139	2018	0	0	0	1	8732848118	270844	CHC-SC
140	2018	0	0	0	1	8731037375	270847	CHC-SC
141	2018	0	0	0	1	8119876591	270865	CHC-SC
142	2018	0	0	0	1	8415034869	270855	CHC-SC
143	2018	0	0	0	1	7085942932	270930	CHC-SC
145	2018	0	0	0	1	8414919662	270898	CHC-SC
146	2018	0	0	0	1	8731990383	270902	CHC-SC
147	2018	0	0	0	1	9862926445	270871	CHC-SC
149	2018	0	0	0	1	8732087599	270953	songjang sc
151	2018	0	0	0	1	7085952962	270891	CHC-SC
152	2018	0	0	0	1	9402257597	270897	CHC-SC
153	2018	0	0	0	1	9402737806	270894	CHC-SC
154	2018	0	0	0	1	7085434701	270895	CHC-SC
155	2018	0	0	0	1	9436816414	270899	CHC-SC
156	2018	0	0	0	1	9436418614	270900	CHC-SC
157	2018	0	0	0	1	8731869233	270887	CHC-SC
158	2018	0	0	0	1	8413050112	270884	CHC-SC
160	2018	0	0	0	1	9612614629	270878	CHC-SC
159	2018	0	0	0	1	8974729856	270879	CHC-SC
148	2018	0	0	0	1	9861552480	270883	CHC-SC
161	2018	0	0	0	2	8730813215	270880	CHC-SC
162	2018	0	0	0	1	9402084336	270896	CHC-SC
163	2018	0	0	0	1	8732862914	270904	CHC-SC
164	2018	0	0	0	1	7085649415	270868	CHC-SC
165	2018	0	0	0	1	8131852567	270867	CHC-SC
166	2018	0	0	0	1	9402257023	270877	CHC-SC
167	2018	0	0	0	1	7085786278	270872	CHC-SC
150	2018	0	0	0	1	9402735084	270889	CHC-SC
144	2018	0	0	0	1	8730806174	270870	CHC-SC
168	2018	0	0	0	1	8731943662	270943	KHUBUNG KHULLEN SC
169	2018	0	0	0	1	8731919984	270947	KHUBUNG KHULLEN SC
170	2018	0	0	0	1	8974613392	270946	KHUBUNG KHULLEN SC
171	2018	0	0	0	1	8974712813	270941	KHUBUNG KHULLEN SC
172	2018	0	0	0	1	7085214286	270948	KHUBUNG KHULLEN SC
173	2018	0	0	0	1	8730060985	270890	KHUBUNG KHULLEN SC
174	2018	0	0	0	1	9436877262	270892	KHUBUNG KHULLEN SC
175	2018	0	0	0	1	8730003162	270885	KHUBUNG KHULLEN SC
176	2018	0	0	0	1	8732887479	270909	KHUBUNG KHULLEN SC
177	2018	0	0	0	1	9402082780	270905	KHUBUNG KHULLEN SC
178	2018	0	0	0	1	9402766096	270940	KHUBUNG KHULLEN SC
179	2018	0	0	0	1	9402987831	270937	SAJIK TAMPAK SC
180	2018	0	0	0	1	9436623688	270936	SAJIK TAMPAK SC.
181	2018	0	0	0	1	9485263386	270910	SAJIK TAMPAK SC
182	2018	0	0	0	1	9402944832	270920	SAJIK TAMPAK SC
183	2018	0	0	0	1	9485260069	270927	SAJIK TAMPAK SC
184	2018	0	0	0	1	9402257789	270924	SAJIK TAMPAK SC
185	2018	0	0	0	1	7085785967	270914	SAJIK TAMPAK SC
186	2018	0	0	0	1	9402267667	270923	SAJIK TAMPAK SC
187	2018	0	0	0	1	9402257764	270919	SAJIK TAMPAK SC
188	2018	0	0	0	1	9402968635	270921	SAJIK TAMPAK SC
189	2018	0	0	0	1	9402674806	270901	SAJIK TAMPAK SC
190	2018	0	0	0	1	8732025621	270916	SAJIK TAMPAK SC
191	2018	0	0	0	1	9402637512	270922	SAJIK TAMPAK SC
192	2018	0	0	0	1	9436887247	270925	SAJIK TAMPAK SC
193	2018	0	0	0	1	8729821252	270912	SAJIK TAMPAK SC
194	2018	0	0	0	1	9402257751	270918	SAJIK TAMPAK SC
195	2018	0	0	0	1	8131029278	271001	SEHLON SC
196	2018	0	0	0	1	9402882946	270954	SONGJANG SC
197	2018	0	0	0	1	8730815521	270957	SONGJANG SC
198	2018	0	0	0	1	8730812117	270984	SAIBOL JOUPI SC
199	2018	0	0	0	1	9615238242	931313	CHC-SC
200	2018	0	0	0	1	9862625829	931116	CHC-SC
201	2018	0	0	0	1	8729976716	270859	CHC-SC
202	2018	0	0	0	1	9402257692	931305	Sajik Tampak SC
204	2018	0	0	0	1	8729892171	931205	Sehlon SC
205	2018	0	0	0	1	7629948970	270981	SAIBOL JOUPI SC
206	2018	0	0	0	1	9402256898	270986	SAIBOL JOUPI SC
207	2018	0	0	0	1	8730942631	270977	SAIBOL JOUPI SC
208	2018	0	0	0	1	9856572055	931131	SAIBOL JOUPI SC
209	2018	0	0	0	1	8974608503	270979	SAIBOL JOUPI SC
210	2018	0	0	0	1	9089289106	270945	SAIBOL JOUPI SC
211	2018	0	0	0	1	8014165079	931195	SAIBOL JOUPI SC
212	2018	0	0	0	1	8730812117	931173	SAIBOL JOUPI SC
213	2018	0	0	0	1	8730942631	270980	SAIBOL JOUPI SC
214	2018	0	0	0	1	8132050127	270988	SONGJANG SC
215	2018	0	0	0	1	9402865107	270987	SONGJANG SC
216	2018	0	0	0	1	9615218711	931134	SEHLON SC
217	2018	0	0	0	1	8448993197	931164	SEHLON SC
218	2018	0	0	0	1	9436082678	931207	SEHLON SC
219	2018	0	0	0	1	7085185269	931143	SEHLON SC
220	2018	0	0	0	1	8131029278	931149	SEHLON SC
203	2018	0	0	0	1	8119942527	931112	SEHLON SC
\.


--
-- Data for Name: nregas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.nregas (village_nrega_id, nrega_reference_year, total_job_card, village_code) FROM stdin;
141	2018	138	270748
142	2018	22	931221
8	2018	70	270937
9	2018	32	270936
10	2018	29	270896
11	2018	173	270883
12	2018	56	270893
13	2018	78	270853
14	2018	95	270938
15	2018	61	270918
16	2018	191	270886
17	2018	28	270871
18	2018	154	270882
19	2018	95	270903
20	2018	78	270848
21	2018	40	270868
22	2018	62	270910
23	2018	24	270915
24	2018	44	270933
25	2018	78	270920
26	2018	24	271011
27	2018	81	270892
28	2018	0	270902
29	2018	70	270891
30	2018	22	270930
31	2018	48	270909
32	2018	44	270907
33	2018	38	270940
34	2018	31	270927
35	2018	56	270929
36	2018	33	270860
37	2018	20	270931
38	2018	30	270888
39	2018	223	270946
40	2018	60	270924
41	2018	61	270948
42	2018	23	270923
43	2018	0	270887
44	2018	39	270874
45	2018	34	270862
46	2018	106	270842
47	2018	46	270881
48	2018	1	270913
49	2018	20	270889
50	2018	23	270906
51	2018	83	270911
52	2018	0	270949
53	2018	72	270856
54	2018	47	270873
55	2018	25	270864
56	2018	55	270852
57	2018	155	270925
58	2018	33	270914
59	2018	77	270867
60	2018	75	270919
61	2018	12	270895
62	2018	122	270884
63	2018	54	270879
64	2018	33	270947
65	2018	34	270926
66	2018	71	270899
67	2018	24	270944
68	2018	99	270894
69	2018	78	270849
70	2018	127	270921
71	2018	40	271012
72	2018	41	270900
73	2018	69	270872
74	2018	92	270897
75	2018	62	270850
76	2018	39	270851
77	2018	31	270912
78	2018	12	270890
79	2018	24	270935
80	2018	47	270877
81	2018	87	270847
82	2018	65	270846
83	2018	89	270845
84	2018	52	270844
85	2018	11	270905
86	2018	157	270943
87	2018	84	270865
88	2018	110	270866
89	2018	47	270916
90	2018	53	270901
91	2018	100	270855
92	2018	50	270861
93	2018	46	270876
94	2018	89	270885
95	2018	60	270870
96	2018	14	931120
97	2018	75	270792
98	2018	124	270760
99	2018	46	270829
100	2018	49	270795
101	2018	27	270784
102	2018	51	270780
103	2018	14	270782
104	2018	33	270772
105	2018	27	931187
106	2018	35	931094
107	2018	19	270783
108	2018	40	931227
109	2018	49	270836
110	2018	138	270787
111	2018	20	270788
112	2018	40	270789
113	2018	37	931219
114	2018	66	270757
115	2018	37	931122
116	2018	41	270793
117	2018	69	931097
118	2018	35	270812
119	2018	40	270756
120	2018	13	270753
121	2018	44	270794
122	2018	12	931225
123	2018	54	931171
124	2018	48	270841
125	2018	47	270837
126	2018	80	270790
127	2018	34	270800
128	2018	94	931230
129	2018	69	931138
130	2018	188	931105
131	2018	31	270762
132	2018	159	270744
133	2018	35	270763
134	2018	80	931130
135	2018	197	931113
136	2018	39	931222
137	2018	31	270758
138	2018	57	270776
139	2018	29	931162
140	2018	51	270833
143	2018	10	931179
144	2018	37	270749
145	2018	26	931166
146	2018	55	270747
147	2018	55	270767
148	2018	36	270815
149	2018	27	270791
150	2018	45	270768
151	2018	20	931181
152	2018	162	270827
153	2018	50	931226
154	2018	30	270814
155	2018	68	270813
156	2018	40	270828
157	2018	114	270786
158	2018	86	270834
159	2018	63	931243
160	2018	45	931124
161	2018	85	270765
162	2018	50	270808
163	2018	50	270809
164	2018	28	270839
165	2018	21	931220
166	2018	57	270750
167	2018	64	270804
168	2018	49	270799
169	2018	30	270798
170	2018	64	270797
171	2018	52	270822
172	2018	39	931231
173	2018	54	931129
174	2018	51	270766
175	2018	26	931109
176	2018	81	270820
177	2018	30	270779
178	2018	42	931180
179	2018	43	270785
180	2018	52	270761
181	2018	27	931185
182	2018	30	931115
183	2018	38	270802
184	2018	18	270777
185	2018	54	270769
186	2018	18	270778
187	2018	43	270830
188	2018	19	931228
189	2018	33	270803
190	2018	132	270826
191	2018	15	270781
192	2018	78	270838
193	2018	69	270806
194	2018	40	270832
195	2018	17	270831
196	2018	135	270745
197	2018	37	931174
198	2018	46	270796
199	2018	94	270807
200	2018	50	270752
201	2018	52	270755
202	2018	68	270754
203	2018	104	270751
204	2018	71	931135
205	2018	34	931232
206	2018	27	931161
207	2018	26	931189
208	2018	30	931229
209	2018	16	931119
210	2018	38	931163
211	2018	30	931158
212	2018	36	270816
213	2018	71	270811
214	2018	0	270810
215	2018	82	270759
216	2018	41	931111
217	2018	31	931224
218	2018	25	931183
219	2018	35	270775
220	2018	75	270771
221	2018	31	270770
222	2018	57	270746
223	2018	69	270774
224	2018	52	931117
225	2018	135	270821
226	2018	53	270801
227	2018	30	931092
228	2018	47	931093
229	2018	0	931096
230	2018	21	931101
231	2018	37	931103
232	2018	28	931107
233	2018	29	931108
234	2018	0	270678
235	2018	21	931121
236	2018	54	270978
237	2018	0	931112
238	2018	34	270962
239	2018	30	931110
240	2018	32	270991
241	2018	22	931116
242	2018	48	270961
243	2018	27	931118
244	2018	76	270942
245	2018	21	931123
246	2018	24	931127
247	2018	20	931133
248	2018	24	931128
249	2018	53	931134
250	2018	47	270987
251	2018	52	931131
252	2018	23	931132
253	2018	57	270988
254	2018	36	931137
255	2018	35	931140
256	2018	20	270992
257	2018	58	270982
258	2018	60	270979
259	2018	37	270968
260	2018	76	271008
261	2018	75	270973
262	2018	40	931144
263	2018	25	931145
264	2018	68	270969
265	2018	35	270950
266	2018	32	931149
267	2018	33	271010
268	2018	18	931143
269	2018	35	270642
270	2018	36	271002
271	2018	26	931154
272	2018	70	270971
273	2018	23	931151
274	2018	32	931159
275	2018	35	931155
276	2018	20	931168
277	2018	23	931165
278	2018	25	931167
279	2018	137	271006
280	2018	30	270974
281	2018	54	270972
282	2018	49	931172
283	2018	37	931184
284	2018	15	931188
285	2018	31	931190
286	2018	33	931125
287	2018	81	931193
288	2018	23	931139
289	2018	43	931194
290	2018	35	931196
291	2018	45	931197
292	2018	22	931201
293	2018	54	931198
294	2018	22	931203
295	2018	35	931204
296	2018	30	931199
297	2018	55	270980
298	2018	30	931206
299	2018	50	270977
300	2018	48	270995
301	2018	25	271009
302	2018	33	270976
303	2018	19	931207
304	2018	45	931208
305	2018	58	931209
306	2018	30	931444
307	2018	20	931441
308	2018	30	270985
309	2018	30	270975
310	2018	55	270952
311	2018	23	270981
312	2018	23	931447
313	2018	26	931317
314	2018	34	270966
315	2018	71	270967
316	2018	46	270999
317	2018	64	270986
318	2018	21	931303
319	2018	31	931305
320	2018	58	931141
321	2018	35	270958
322	2018	37	270945
\.


--
-- Data for Name: populations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.populations (reference_year, total_household, total_population, village_code, counting_agency) FROM stdin;
2011	66	44	931120	1
2018	48	45	270937	1
2018	17	17	270936	1
2018	23	71	270896	1
2018	45	288	270883	1
2018	10	48	270893	1
2018	29	52	270964	1
2018	13	78	270938	1
2018	59	61	270918	1
2018	156	412	270886	1
2018	21	41	270871	1
2018	59	107	270882	1
2018	11	51	270848	1
2018	31	326	270868	1
2018	68	0	270910	1
2018	52	89	270933	1
2018	94	373	270920	1
2018	40	63	270892	1
2018	31	248	270891	1
2018	13	0	270930	1
2018	22	96	270909	1
2018	16	63	270907	1
2018	17	34	270927	1
2018	31	164	270860	1
2018	25	127	270888	1
2018	93	222	270760	1
2018	45	225	270946	1
2018	28	48	270829	1
2018	52	239	270941	1
2018	73	343	270795	1
2018	12	51	270923	1
2018	29	178	270784	1
2018	63	357	270874	1
2018	56	102	270780	1
2018	56	330	270862	1
2018	35	156	270772	1
2018	99	548	270842	1
2018	28	75	931094	1
2018	10	49	270843	1
2018	32	60	931227	1
2018	35	82	270836	1
2018	43	126	270856	1
2018	158	580	270787	1
2018	19	187	270788	1
2018	34	209	270789	1
2018	16	24	270852	1
2018	40	189	931219	1
2018	11	21	270863	1
2018	67	318	270757	1
2018	12	33	931092	1
2018	92	102	270919	1
2018	40	166	931122	1
2018	40	151	270793	1
2018	29	0	270947	1
2018	20	102	270926	1
2018	17	56	270756	1
2018	55	302	270794	1
2018	13	62	270841	1
2018	17	72	270835	1
2018	13	97	270837	1
2018	12	0	270899	1
2018	65	285	270790	1
2018	102	0	270894	1
2018	33	166	270800	1
2018	57	108	270849	1
2018	76	174	931230	1
2018	150	287	270921	1
2018	68	117	931138	1
2018	17	0	270900	1
2018	62	0	270850	1
2018	180	698	931105	1
2018	46	0	270851	1
2018	45	290	270773	1
2018	22	44	270912	1
2018	16	88	270762	1
2018	10	20	270935	1
2018	173	798	270744	1
2018	13	32	270877	1
2018	36	162	270763	1
2018	75	124	270847	1
2018	95	474	931130	1
2018	50	101	270846	1
2018	171	1030	931113	1
2018	79	151	270845	1
2018	37	192	931222	1
2018	49	91	270844	1
2018	35	145	270758	1
2018	48	0	270943	1
2018	43	357	270776	1
2018	75	0	270865	1
2018	34	78	270833	1
2018	22	44	270916	1
2018	20	40	270960	1
2018	159	694	270748	1
2018	13	24	270901	1
2018	27	74	931221	1
2018	38	0	270855	1
2018	41	131	931223	1
2018	35	0	270861	1
2018	10	20	931179	1
2018	12	24	270876	1
2018	44	0	270885	1
2018	50	153	270749	1
2018	32	180	931140	1
2018	17	112	931166	1
2018	56	215	270747	1
2018	171	1030	270805	1
2018	55	210	270767	1
2018	33	65	270815	1
2018	43	104	270791	1
2018	32	138	270768	1
2018	14	26	931181	1
2018	23	152	931093	1
2018	190	945	270827	1
2018	48	79	931226	1
2018	15	69	931101	1
2018	28	48	270814	1
2018	17	130	931103	1
2018	59	86	270813	1
2018	41	219	270828	1
2018	130	566	270786	1
2018	12	95	931107	1
2018	51	102	270834	1
2018	15	50	931108	1
2018	32	147	931243	1
2018	19	125	270978	1
2018	42	72	931124	1
2018	37	159	270962	1
2018	53	281	270765	1
2018	10	85	931116	1
2018	45	70	270808	1
2018	38	206	270961	1
2018	50	250	270809	1
2018	14	46	270839	1
2018	23	110	931220	1
2018	20	102	931118	1
2018	54	251	270750	1
2018	15	89	270942	1
2018	83	390	270804	1
2018	70	258	270799	1
2018	37	158	270987	1
2018	33	142	270798	1
2018	79	381	270797	1
2018	20	111	931231	1
2018	10	69	270824	1
2018	58	302	931129	1
2018	48	195	270766	1
2018	18	122	931131	1
2018	18	74	931109	1
2018	14	111	931137	1
2018	173	798	931114	1
2018	95	462	270820	1
2018	15	69	270988	1
2018	23	113	270779	1
2018	15	41	931180	1
2018	55	217	270785	1
2018	25	203	270982	1
2018	145	1051	270819	1
2018	55	261	270761	1
2018	12	73	931185	1
2018	39	200	270979	1
2018	35	132	931115	1
2018	44	194	270802	1
2018	32	144	270968	1
2018	12	72	270777	1
2018	44	288	270769	1
2018	43	243	271008	1
2018	45	234	270830	1
2018	32	164	270973	1
2018	13	67	931228	1
2018	29	160	931144	1
2018	30	114	270803	1
2018	140	751	270826	1
2018	19	79	270969	1
2018	32	172	270838	1
2018	20	147	270950	1
2018	80	318	270806	1
2018	45	204	270832	1
2018	15	120	270642	1
2018	45	103	270831	1
2018	129	554	270745	1
2018	11	104	271002	1
2018	40	180	931174	1
2018	21	106	270971	1
2018	54	271	270796	1
2018	13	99	931155	1
2018	130	502	931242	1
2018	97	184	270807	1
2018	32	127	270752	1
2018	100	574	271006	1
2018	43	184	270755	1
2018	12	101	270974	1
2018	70	347	270754	1
2018	95	355	270751	1
2018	13	101	270972	1
2018	92	432	931135	1
2018	30	200	931172	1
2018	31	104	931229	1
2018	10	102	931184	1
2018	10	114	931119	1
2018	44	49	931163	1
2018	10	71	931158	1
2018	10	92	931190	1
2018	40	425	270816	1
2018	10	49	931125	1
2018	123	334	270811	1
2018	130	502	270810	1
2018	73	644	931192	1
2018	25	104	931111	1
2018	31	208	931193	1
2018	19	44	931224	1
2018	23	40	270775	1
2018	20	113	931139	1
2018	75	326	270771	1
2018	20	160	931194	1
2018	29	165	270770	1
2018	56	223	270746	1
2018	20	94	931196	1
2018	17	77	931117	1
2018	180	698	270821	1
2018	38	370	931197	1
2018	41	190	270801	1
2018	17	128	931198	1
2018	24	254	931204	1
2018	18	149	270980	1
2018	10	95	931206	1
2018	17	128	270977	1
2018	35	225	270995	1
2018	10	117	271009	1
2018	21	134	931209	1
2018	15	46	270952	1
2018	13	86	270981	1
2018	11	153	931317	1
2018	10	72	270966	1
2018	29	141	270967	1
2018	11	114	270999	1
2018	27	150	270986	1
2018	59	309	931141	1
2018	24	155	270958	1
2018	22	148	270945	1
2018	38	244	931202	1
2018	20	102	931175	1
2018	20	85	270971	3
2018	14	70	931092	3
2018	25	120	931093	3
2018	0	0	931096	3
2018	10	50	931101	3
2018	22	115	931103	3
2018	20	105	931107	3
2018	13	65	931108	3
2018	0	0	270678	3
2018	14	70	931121	3
2018	29	145	270978	3
2018	0	0	931112	3
2018	23	115	270962	3
2018	8	40	931110	3
2018	8	40	270991	3
2018	4	20	931116	3
2018	31	155	270961	3
2018	13	65	931118	3
2018	18	90	270942	3
2018	8	40	931127	3
2018	5	25	931133	3
2018	4	20	931128	3
2018	5	25	931134	3
2018	41	205	270987	3
2018	16	80	931131	3
2018	10	50	931132	3
2018	16	80	270988	3
2018	0	0	931136	3
2018	0	0	271005	3
2018	13	65	931137	3
2018	26	130	931140	3
2018	5	25	270992	3
2018	24	120	270982	3
2018	40	160	270979	3
2018	23	115	270968	3
2018	80	270	271008	3
2018	40	140	270973	3
2018	0	0	931148	3
2018	32	128	931144	3
2018	5	25	931145	3
2018	20	90	270969	3
2018	35	175	270950	3
2018	10	50	931149	3
2018	15	75	271010	3
2018	2	10	931143	3
2018	12	60	270642	3
2018	16	80	271002	3
2018	8	40	931154	3
2018	0	0	931156	3
2018	0	0	270734	3
2018	0	0	931157	3
2018	4	20	931151	3
2018	8	40	931159	3
2018	22	110	931155	3
2018	0	0	931153	3
2018	0	0	931164	3
2018	10	50	931168	3
2018	10	50	931165	3
2018	5	25	931167	3
2018	100	490	271006	3
2018	14	70	270974	3
2018	17	85	270972	3
2018	32	160	931172	3
2018	13	65	931184	3
2018	0	0	931178	3
2018	3	15	931188	3
2018	10	50	931190	3
2018	12	60	931125	3
2018	82	410	931192	3
2018	42	210	931193	3
2018	11	55	931139	3
2018	20	100	931194	3
2018	12	60	931196	3
2018	45	225	931197	3
2018	4	20	931201	3
2018	35	175	931198	3
2018	9	45	931203	3
2018	23	115	931204	3
2018	7	35	931199	3
2018	0	0	931200	3
2018	0	0	931205	3
2018	17	85	270980	3
2018	0	0	931442	3
2018	0	0	931443	3
2018	10	50	931206	3
2018	26	140	270977	3
2018	26	125	270995	3
2018	7	35	271009	3
2018	8	40	270976	3
2018	0	0	931207	3
2018	0	0	931208	3
2018	27	135	931209	3
2018	9	45	931444	3
2018	0	0	931441	3
2018	15	75	270985	3
2018	0	0	931445	3
2018	10	50	270975	3
2018	12	60	270952	3
2018	12	60	270981	3
2018	0	0	931446	3
2018	3	15	931447	3
2018	0	0	931448	3
2018	0	0	931299	3
2018	0	0	931315	3
2018	13	65	931317	3
2018	10	50	270966	3
2018	21	105	931302	3
2018	20	100	270999	3
2018	27	135	270986	3
2018	0	0	931303	3
2018	5	25	931305	3
2018	0	0	270917	3
2018	30	150	931141	3
2018	0	0	931306	3
2018	0	0	931307	3
2018	22	120	270958	3
2018	20	95	270945	3
2018	32	176	270937	3
2018	25	81	270936	3
2018	30	130	270896	3
2018	60	330	270883	3
2018	21	89	270893	3
2018	25	102	270853	3
2018	25	111	270938	3
2018	30	250	270918	3
2018	182	927	270886	3
2018	25	151	270871	3
2018	86	301	270882	3
2018	25	185	270903	3
2018	20	100	270848	3
2018	40	221	270868	3
2018	42	200	270910	3
2018	60	290	270933	3
2018	89	225	270920	3
2018	7	22	271011	3
2018	20	77	270892	3
2018	81	297	270891	3
2018	35	116	270909	3
2018	25	103	270907	3
2018	20	83	270940	3
2018	20	97	270927	3
2018	10	40	270929	3
2018	34	181	270860	3
2018	40	113	270888	3
2018	40	113	270946	3
2018	50	250	270924	3
2018	60	179	270948	3
2018	20	122	270923	3
2018	5	76	270887	3
2018	28	108	270908	3
2018	39	132	270874	3
2018	34	186	270862	3
2018	23	140	270875	3
2018	95	413	270842	3
2018	15	67	270913	3
2018	5	30	270843	3
2018	10	70	270906	3
2018	42	331	270911	3
2018	32	181	270856	3
2018	40	160	270873	3
2018	11	61	270864	3
2018	25	62	270852	3
2018	41	250	270925	3
2018	21	100	270914	3
2018	7	22	270934	3
2018	18	81	270863	3
2018	10	30	270939	3
2018	82	408	270867	3
2018	85	268	270919	3
2018	4	10	270895	3
2018	22	142	270884	3
2018	30	172	270879	3
2018	23	173	270947	3
2018	25	102	270926	3
2018	5	21	270996	3
2018	20	90	270898	3
2018	5	20	270904	3
2018	30	133	270899	3
2018	15	89	270944	3
2018	185	723	270894	3
2018	41	279	270849	3
2018	130	499	270921	3
2018	20	107	271012	3
2018	25	120	270900	3
2018	6	58	270857	3
2018	26	123	270872	3
2018	60	306	270897	3
2018	61	351	270850	3
2018	25	120	270922	3
2018	39	227	270851	3
2018	17	101	270912	3
2018	20	70	270890	3
2018	15	99	270935	3
2018	25	101	270877	3
2018	81	421	270847	3
2018	75	407	270846	3
2018	81	421	270845	3
2018	70	300	270844	3
2018	189	930	270880	3
2018	36	228	270878	3
2018	47	222	270943	3
2018	90	551	270865	3
2018	120	454	270866	3
2018	32	121	270916	3
2018	20	107	270901	3
2018	42	177	270855	3
2018	259	41	270861	3
2018	30	124	270876	3
2018	25	111	270869	3
2018	47	323	270885	3
2018	7	50	270928	3
2018	45	211	270870	3
2011	88	999	270964	4
2011	99	555	270938	4
2011	68	400	270883	4
2011	66	400	270896	4
2019	58	700	270784	5
2011	66	700	931103	4
2011	65	450	270784	4
2011	61	555	931092	4
\.


--
-- Data for Name: power_infras; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.power_infras (id, village_code, household_no, electrified_household_no, reference_year) FROM stdin;
2	270760	66	45	2019
3	270896	66	45	2019
4	270893	55	88	2019
\.


--
-- Data for Name: schemes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.schemes (scheme_name, department_id, scheme_code, scheme_financial_year, scheme_status, sanction_amount) FROM stdin;
Health Schemes	1	1	2017	Ongoing	45.600
RMSA	3	3	2015	Ongoing	66.000
Scocial Schemes	2	2	2014	Ongoing	99.000
IGNOPS	2	4	2018	Ongoing	50.000
PMAY	14	5	2018	Ongoing	56.000
\.


--
-- Name: schemes_scheme_code_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.schemes_scheme_code_seq', 5, true);


--
-- Data for Name: subdistricts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.subdistricts (subdistrict_code, subdistrict_version, subdistrict_name, subdistrict_name_local, district_code, census2001_code, census2011_code) FROM stdin;
1895	3	Chakpikarong	\N	253	4	1895
1894	3	Chandel	\N	253	3	1894
6496	1	KHENGJOY	KHENGJOY	253	\N	0
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (user_id, user_creation_date, user_name, password, user_email, user_mobile, role_id) FROM stdin;
25	2018-08-08 07:27:47.561843	admin	$2y$10$jkFaWP8LxriTHAQGbi9kHu4SN4ybf/A5vSvAocQyuY3oo8EBH.nDa	jdslfkd@.com	9436027975	13
22	2018-08-07 08:35:28.116027	cdl.cafpd	$2y$10$TCDY4RjeesAyn8SQJ.FexuhASx9xW1dQ8LD3/KGwCZcuFN8NllQ72	joychand80@gmail.com	9436027975	2
34	2018-08-09 09:33:51.936896	cdl.security	$2y$10$S2OOi7RVvrHtvUZF6Y3xzeG9yNuUTipGwReJvXcsWKAmC3f.asT/G	joychand80@gmail.com	9436027975	11
27	2018-08-08 10:04:44.781149	cdl.education	$2y$10$fzMjCeL0LRWcSSqUXtjTouMX7SoBbRy.W03UwktKBahJgkNO89kxS	joychand80@gmail.com	9436027975	3
26	2018-08-08 08:31:26.232127	cdl.anganwadi	$2y$10$T3HINX7.zlKPor3.KZ6rb.jSPCoeSFXC/BOpRV.ELJ.TWqjgSHiMW	joychand80@gmail.com	9436027975	1
33	2018-08-09 08:36:51.676048	cdl.nsap	$2y$10$1WKJhhqRGSrK89Gzwk84m.8/m77Oq615FQpx8ZwUadrL5Nn11uQES	joychand80@gmail.com	9436027975	8
31	2018-08-08 11:37:20.789596	cdl.election	$2y$10$DyjWIV4lKDCw4Y6EXRUx1eDuz/h0LJsqWCL73D2qx9hbt2vYe.esO	joychand80@gmail.com	9436027975	4
30	2018-08-08 11:29:44.330477	cdl.nercormp	$2y$10$j86VlXuzOIMS.fjGqxM5T.7SLqbbYgv2MgyzpjTIXsPxIASk4Ziay	joychand80@gmail.com	9436027975	6
28	2018-08-08 11:17:59.281618	cdl.health	$2y$10$u.g4mBa1LI69a4ALjMsjl.cCnYAgE6rP2Bxx5crdeKPVkqGyccB.C	joychand80@gmail.com	9436027975	5
35	2018-08-21 05:36:27.578887	manager	$2y$10$KTvQJQJ92P86tZyzhSfbwOcthH7R7ALOkio8i1KH1XiWrRKxB3JYa	jdslfkd@.com	9436027975	14
36	2018-10-20 06:30:32.779217	sdo.chakpikarong	$2y$10$XTuWRKq39.9tSzTZAvurK.H5hahSdlqroegamkKyvU/mNf6.mUFOa	sfldskj@gmail.com	700564321	15
37	2018-10-20 06:31:09.029348	sdo.chandel	$2y$10$aMFNJhcm8DHLJtdC6X28MOg/SPwDUsx2now.9EFQVLnkxcsOZHUuS	sdfdsf@gmail.com	7005678432	15
38	2018-10-20 06:31:53.601147	sdo.khengjoy	$2y$10$NLM/IYB9bBg.uzSmss.5/ulvrujfDCnCKCpaviIFEZ2IP4/gjVn8W	sdfdsf@gmail.com	7005643216	15
39	2018-10-20 06:32:30.006783	dc.chandel	$2y$10$fngumBmwJH9u8ggYR8HOdeQpzhHc8SVseIomJlEkhErkKpXWigm4y	sdfdsf@gmail.com	8976543218	16
\.


--
-- Data for Name: users_roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users_roles (users_role_id, user_role_name) FROM stdin;
1	Anganwadi_role
2	CAF&PD_role
3	Education_role
4	Election_role
5	Health_role
6	NERCORMP_role
7	NREGA_role
8	NSAPS_role
9	SDOReport_role
10	Schemes_role
12	Village_info_ro
13	Admin
11	SecurityReport_
14	Manager
15	sdo_role
16	dc_role
\.


--
-- Name: villageDisableInfo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."villageDisableInfo_id_seq"', 2, true);


--
-- Data for Name: village_disable_infos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.village_disable_infos (id, village_code, reference_year, blind, deaf, others) FROM stdin;
2	270760	2019	4	7	5
\.


--
-- Data for Name: village_electorals; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.village_electorals (village_electoral_id, reference_year, electoral_total_household, electoral_total_voter, village_code) FROM stdin;
\.


--
-- Data for Name: village_infos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.village_infos (village_info_id, village_photo1, village_photo2, village_photo3, distance_from_ib, village_code) FROM stdin;
1	\N	\N	\N	55.00	270844
2	\N	\N	\N	55.00	270859
3	\N	\N	\N	4.00	270966
4	\N	\N	\N	24.00	270847
5	\N	\N	\N	66.00	270896
6	\N	\N	\N	25.00	270910
7	\N	\N	\N	12.00	270937
8	\N	\N	\N	45.00	270896
9	\N	\N	\N	66.00	270990
10	\N	\N	\N	5.00	270893
11	\N	\N	\N	6.00	270896
\.


--
-- Data for Name: village_nsaps; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.village_nsaps (village_nsap_id, total_widows_beneficiary, total_handicap_beneficiary, total_ignoaps_beneficiary, village_code, reference_year) FROM stdin;
6	0	1	0	270792	2018
7	1	0	0	931241	2018
8	0	0	6	270760	2018
9	0	0	6	270829	2018
10	1	0	4	270795	2018
11	0	1	5	270784	2018
12	2	1	7	270780	2018
13	0	0	2	270772	2018
14	0	0	2	931094	2018
15	0	0	2	270783	2018
16	0	0	12	931227	2018
17	0	1	5	270836	2018
18	0	0	9	270787	2018
19	1	0	4	270788	2018
20	0	0	5	270789	2018
21	0	0	3	931219	2018
22	0	0	4	270757	2018
23	1	0	11	931122	2018
24	0	1	1	931097	2018
25	0	0	1	270812	2018
26	0	0	1	270756	2018
27	0	0	11	270794	2018
28	0	0	1	931225	2018
30	0	0	3	270841	2018
29	0	0	2	931171	2018
31	0	0	1	270835	2018
32	0	0	1	270837	2018
33	3	0	6	270790	2018
34	0	0	4	270800	2018
35	0	1	7	931230	2018
36	0	0	3	931138	2018
37	0	0	1	270764	2018
38	8	1	32	931105	2018
39	0	0	6	270773	2018
40	0	0	1	270762	2018
41	0	0	6	270744	2018
42	0	0	2	270763	2018
43	3	1	5	931130	2018
44	0	1	5	931113	2018
45	0	0	4	270758	2018
46	0	0	6	270776	2018
47	0	0	2	931162	2018
48	0	0	6	270833	2018
49	0	0	14	270748	2018
50	1	0	1	931221	2018
51	0	0	2	270749	2018
52	0	0	2	931166	2018
53	0	0	2	270747	2018
54	0	1	10	270805	2018
55	0	0	4	270767	2018
56	0	0	8	270815	2018
57	0	0	4	270791	2018
58	0	0	6	270768	2018
59	0	0	1	931181	2018
60	0	1	29	270827	2018
61	0	0	19	270814	2018
62	1	0	0	270813	2018
63	1	0	0	270817	2018
64	0	0	10	270828	2018
65	0	1	22	270786	2018
66	3	0	9	270834	2018
67	2	0	7	931243	2018
68	0	0	1	931124	2018
69	0	1	4	270765	2018
70	1	0	10	270808	2018
71	1	0	7	270809	2018
72	0	1	1	270839	2018
73	0	1	0	270750	2018
74	2	0	7	270804	2018
75	2	0	18	270799	2018
76	0	2	0	270797	2018
77	0	0	2	270822	2018
78	0	0	1	931129	2018
79	0	0	2	270766	2018
80	0	0	1	931109	2018
81	0	0	6	931114	2018
82	0	4	5	270820	2018
83	1	0	5	270779	2018
84	0	0	3	270818	2018
85	2	0	4	270785	2018
86	1	2	17	270819	2018
87	0	0	5	270761	2018
88	0	0	3	931185	2018
89	0	0	3	931115	2018
90	0	0	1	270802	2018
91	0	0	3	270777	2018
92	1	1	11	270769	2018
93	0	1	6	270830	2018
94	0	0	1	931228	2018
95	0	0	2	270803	2018
96	2	1	8	270826	2018
97	0	0	2	270781	2018
98	0	0	8	270838	2018
99	0	0	8	270806	2018
100	0	0	12	270832	2018
101	0	2	13	270831	2018
102	0	0	6	270745	2018
103	0	0	4	931174	2018
104	0	0	1	270807	2018
105	3	0	2	270752	2018
106	2	2	4	270755	2018
107	0	0	4	270754	2018
108	0	0	4	270751	2018
109	0	0	10	931135	2018
110	0	0	1	931189	2018
111	0	0	3	931229	2018
112	0	1	1	931163	2018
113	0	0	4	931158	2018
114	0	0	2	270816	2018
115	0	1	9	270811	2018
116	1	0	29	270810	2018
117	0	1	0	931111	2018
118	0	0	5	931224	2018
119	0	0	1	931126	2018
120	1	0	1	931183	2018
121	0	0	2	270823	2018
122	0	1	8	270775	2018
123	2	0	10	270771	2018
124	1	0	6	270770	2018
125	0	0	4	270746	2018
126	0	0	14	270774	2018
127	0	0	1	931117	2018
128	1	0	8	270801	2018
129	0	0	1	270936	2018
130	0	0	4	270896	2018
131	2	0	6	270883	2018
132	0	1	3	270893	2018
133	0	0	2	270964	2018
134	0	0	4	270853	2018
135	0	0	3	270938	2018
136	1	0	4	271007	2018
137	0	1	5	270918	2018
138	1	2	34	270886	2018
139	0	0	2	270871	2018
140	1	0	8	270882	2018
141	0	0	5	270868	2018
142	1	0	6	270910	2018
143	0	0	25	270933	2018
144	0	0	7	270920	2018
145	0	0	1	270892	2018
146	1	0	1	270902	2018
147	0	0	5	270930	2018
148	1	0	4	270909	2018
149	0	0	5	270907	2018
150	0	0	1	270927	2018
151	0	0	5	270860	2018
152	0	0	5	270931	2018
153	1	0	6	270946	2018
154	1	0	21	270941	2018
155	0	0	6	270924	2018
156	0	0	1	270948	2018
157	0	0	1	270923	2018
158	0	0	3	270874	2018
159	0	0	5	270862	2018
160	0	0	3	270875	2018
161	0	0	10	270842	2018
162	0	0	8	270911	2018
163	3	0	0	270856	2018
164	0	0	7	270873	2018
165	0	0	4	270864	2018
166	0	0	4	270852	2018
167	0	0	6	270932	2018
168	0	0	6	270925	2018
169	1	0	15	270956	2018
170	0	0	7	270951	2018
171	0	0	3	270984	2018
172	0	0	3	270914	2018
173	7	0	15	270863	2018
174	1	0	0	270963	2018
175	1	0	0	270939	2018
176	0	1	25	270867	2018
177	0	0	17	270919	2018
178	0	0	1	270895	2018
179	0	0	2	270884	2018
180	0	0	2	270879	2018
181	0	0	5	270947	2018
182	0	0	4	270926	2018
183	0	0	1	270898	2018
184	0	0	1	270904	2018
185	0	0	2	270899	2018
186	0	0	21	270894	2018
187	0	0	12	270849	2018
188	0	0	21	270921	2018
189	0	0	3	270900	2018
190	0	0	2	270857	2018
191	0	0	5	270872	2018
192	0	1	0	270897	2018
193	0	0	5	270850	2018
194	0	0	3	270922	2018
195	0	0	4	270851	2018
196	0	0	1	270912	2018
197	0	0	1	270935	2018
198	0	0	1	270877	2018
199	2	0	9	270847	2018
200	2	0	4	270846	2018
201	2	0	16	270845	2018
202	1	0	14	270844	2018
203	0	0	15	270880	2018
204	2	0	6	270878	2018
205	4	0	4	270959	2018
206	0	0	6	270943	2018
207	1	0	19	270865	2018
208	1	0	12	270866	2018
209	0	0	3	270989	2018
210	0	0	6	270855	2018
211	0	0	3	270861	2018
212	0	0	2	270876	2018
213	0	0	3	270869	2018
214	0	0	2	270998	2018
215	1	0	3	270970	2018
216	1	1	4	270885	2018
217	0	0	3	270928	2018
218	3	0	3	270870	2018
219	0	0	3	270678	2018
220	0	0	1	931112	2018
221	0	0	3	270962	2018
222	2	0	0	931110	2018
223	0	0	4	270991	2018
224	0	0	6	270961	2018
225	0	0	1	270988	2018
226	0	0	5	931140	2018
227	0	0	2	270982	2018
228	0	0	11	270979	2018
229	0	0	2	270968	2018
230	0	0	10	271008	2018
231	0	0	10	270973	2018
232	2	0	12	931144	2018
233	0	1	10	270969	2018
234	0	0	7	270950	2018
235	0	0	1	931149	2018
236	0	0	1	270642	2018
237	0	0	3	271002	2018
238	1	0	0	931154	2018
239	0	0	3	270971	2018
240	1	0	0	270734	2018
241	0	0	3	931155	2018
242	0	0	2	931168	2018
243	0	0	6	931167	2018
244	1	0	6	271006	2018
245	0	0	4	270974	2018
246	1	0	2	270972	2018
247	0	0	7	931172	2018
248	0	0	6	931192	2018
249	0	0	9	931193	2018
250	0	0	2	931194	2018
251	0	0	2	931197	2018
252	0	0	4	270980	2018
253	0	0	8	270977	2018
254	0	0	2	270995	2018
255	0	0	8	931209	2018
256	0	0	3	931444	2018
257	0	0	1	270985	2018
258	0	0	4	270975	2018
259	0	0	10	270952	2018
260	0	0	1	931317	2018
261	0	0	3	270966	2018
262	0	0	2	931302	2018
263	0	0	4	270999	2018
264	0	0	5	270986	2018
265	0	0	2	931305	2018
266	0	0	6	931141	2018
267	0	0	10	270958	2018
268	0	0	2	270945	2018
269	0	0	5	931202	2018
270	0	0	5	931175	2018
\.


--
-- Data for Name: village_photos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.village_photos (id, photo, photo_dir, photo_type, photo_size, village_code) FROM stdin;
93	270893-5c383f997a718.jpg	webroot\\img\\VillagePhotos\\photo\\	image/jpeg	125531	270893
94	270896-5c384303ecfb8.jpg	webroot\\img\\VillagePhotos\\photo\\	image/jpeg	125531	270896
95	270896-5c38430415b97.png	webroot\\img\\VillagePhotos\\photo\\	image/png	998088	270896
96	270896-5c38430436baf.jpg	webroot\\img\\VillagePhotos\\photo\\	image/jpeg	387182	270896
\.


--
-- Name: village_photos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.village_photos_id_seq', 125, true);


--
-- Data for Name: village_schemes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.village_schemes (village_scheme_id, village_code, village_scheme_description, scheme_code, village_scheme_start_fin_yr) FROM stdin;
\.


--
-- Data for Name: villages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.villages (village_version, village_code, village_name, sub_district_code, census_2001_code, census_2011_code) FROM stdin;
1	931120	ABANA	1894	\N	000000
1	270792	Abungkhu / Abungnikhu	1894	00220600	270792
1	931241	ABUNGNIKHUW	1894	\N	000000
1	931092	Aibol Jamkhomang	6496	\N	000000
1	931093	Aibol Joupi	6496	\N	000000
1	270937	Aigejang	1895	00233100	270937
1	270760	Aihang	1894	00217900	270760
1	270936	Aisi	1895	00233000	270936
1	931096	Aivomjang	6496	\N	000000
1	270896	Akaphe	1895	00229300	270896
1	270829	Anal Khullen	1894	00224000	270829
1	270883	Anal Khunou	1895	00228200	270883
1	270795	Angkhel Chayang	1894	00220900	270795
1	270893	Beaula	1895	00229100	270893
1	270784	Beru Anthi	1894	00220000	270784
1	270780	Beru Khudam	1894	00219900	270780
1	270782	Beru Molla Bung	1894	00219900	270782
1	270772	Beru Wangkhera	1894	00219100	270772
1	931187	BETHEL HAPPYLANE	1894	\N	000000
1	931094	BETUK	1894	\N	000000
1	270964	Bileijang	1895	00235300	270964
1	270853	Bolchang Tampak	1895	00225900	270853
1	270938	Bollok	1895	00233200	270938
1	270783	Bolnidam	1894	00219900	270783
1	931227	BONGJANG	1894	\N	000000
1	931101	Bonglon	6496	\N	000000
1	931103	Bongmol Tampak	6496	\N	000000
1	271007	Bongmol Tampak	1895	00238800	271007
1	931107	Bonsi	6496	\N	000000
1	931108	C.Gammon	6496	\N	000000
1	270918	Chahkap	1895	00231300	270918
2	270678	Chahmol	6496	00211800	270678
1	931121	Chahnoujang	6496	\N	000000
1	270886	Chakpikarong	1895	00228500	270886
1	270871	Chakpimolbem	1895	00227000	270871
2	270978	Chaljang	6496	00236300	270978
1	931112	Chalkotjang	6496	\N	000000
1	270836	Challong	1894	00224700	270836
1	270787	Chandel Christian	1894	00220300	270787
2	270788	Chandel Khubol	1894	00220400	270788
1	270789	Chandel Khullen	1894	00220500	270789
1	931219	CHANDOLPOKPI	1894	\N	000000
1	270757	Chandrapoto	1894	00217600	270757
2	270962	Changpol	6496	00235200	270962
1	931122	CHARANGCHING KHUNKHA	1894	\N	000000
1	270793	Charang Ching Khunou	1894	00220700	270793
1	270882	Charoiching	1895	00228100	270882
1	931110	Ch.Bileijang	6496	\N	000000
2	270991	Cheljang Joupi	6496	00237400	270991
1	931097	CHENGKHU	1894	\N	000000
1	931116	Chenkhopi	6496	\N	000000
1	270812	Chingkhir	1894	00222300	270812
1	270903	Ch.K.Hringkhu	1895	00229800	270903
1	270756	Chothe Khunou	1894	00217500	270756
1	270753	Chothe Lungleh	1894	00217200	270753
1	270794	Chrang Ching Khullen	1894	00220800	270794
1	931225	CHUMTHAR	1894	\N	000000
1	931171	DAAMPI	1894	\N	000000
1	270841	Darchin	1894	\N	270841
1	270835	Darku (Vomku)	1894	00224600	270835
1	270848	D. Bethany	1895	00225500	270848
1	270868	Dengkhu	1895	00226700	270868
1	270837	Duthang	1894	00224800	270837
2	270961	Gamphajol	6496	00235100	270961
2	270859	Gangpijang	6496	00226100	270859
1	270910	Gelngai	1895	00230500	270910
1	931118	G.Nisohoi	6496	\N	000000
2	270942	Gohok	6496	00233500	270942
1	931123	Gopijang	6496	\N	000000
1	931127	Gothol	6496	\N	000000
1	270915	Gunjil	1895	00231000	270915
1	270933	Haika	1895	00232800	270933
1	270920	Haikha (L)	1895	00231500	270920
1	931133	Haimol	6496	\N	000000
1	270790	Hanatham	1894	00220600	270790
1	931128	H.Bungsanglep	6496	\N	000000
1	270800	Heibunglok	1894	00221300	270800
1	931230	HEIGRUTAMPAK	1894	\N	000000
1	931134	Hengkhot	6496	\N	000000
2	270987	Hengshi	6496	00237100	270987
1	931131	H.Hengcham	6496	\N	000000
1	931132	H.Jalenphai	6496	\N	000000
1	271011	Hl. Bemung	1895	\N	271011
1	931138	HNAHRINGKHU	1894	\N	000000
1	270892	Hnarelal	1895	00229000	270892
2	270988	Hollenjang	6496	00237200	270988
1	270764	Hongbiban	1894	00218300	270764
1	270902	Hringkhu A.	1895	00229700	270902
1	270891	Hringphe	1895	00228900	270891
1	270930	Jangdung	1895	00232500	270930
1	931136	Jangmol	6496	\N	000000
1	931105	JAPHOU	1894	\N	000000
2	271005	J.Lhangnom	6496	00238600	271005
1	931137	JM Moljol	6496	\N	000000
1	931140	Joldam	6496	\N	000000
2	270992	Joumol	6496	00237400	270992
2	270982	Joupi	6496	00236700	270982
1	270773	Julbalching	1894	00219200	270773
1	270762	Kajiphung	1894	00218100	270762
1	270744	Kakching Mantak	1894	00216500	270744
1	270763	Kalika Lok	1894	00218200	270763
1	270909	Kanakangbung	1895	00230400	270909
1	270907	Kanan	1895	00230200	270907
1	931130	KANANKHU	1894	\N	000000
1	270940	Kanaralveng	1895	00233300	270940
1	931113	KAPAAM	1894	\N	000000
1	931222	KARYAMKHW	1894	\N	000000
1	270927	K.Bethel	1895	00232200	270927
1	270758	Keithelmanbi	1894	00217700	270758
1	270776	Khambathel	1894	00219500	270776
2	270979	Khangbarol	6496	00236400	270979
1	931162	KHANGDUNGYON	1894	\N	000000
1	270951	Moltuh	1895	00234200	270951
2	270968	Khangtung	6496	00235600	270968
2	271008	Khengjang	6496	00238900	271008
2	270973	Khengjoy	6496	00236000	270973
1	931148	Kholep	6496	\N	000000
1	270929	Kholmunlen	1895	00232400	270929
1	270833	Khongjon	1894	00224400	270833
1	931144	Khongkang Savumpa	6496	\N	000000
1	270860	Khongnang Pheisabi	1895	00226200	270860
1	270931	Khongtal	1895	00232600	270931
1	270888	Khopijang	1895	00228600	270888
1	931145	Kh.Thingenphai	6496	\N	000000
1	270946	Khubung Khullen	1895	00233800	270946
1	270941	Khubung Khunou	1895	00233400	270941
1	270748	Khudei Khunou	1894	00216900	270748
1	931221	KHUKTHAR	1894	\N	000000
1	931223	KHULAIRAM	1894	\N	000000
1	270924	Khullenkhallet	1895	00231900	270924
1	270948	Khumbungphe	1895	00233900	270948
1	931179	KHUMHRING	1894	\N	000000
2	270969	Khumkot	6496	00235700	270969
1	270923	Khumunnom	1895	00231800	270923
1	270749	Khuninglung	1894	00216900	270749
1	931166	KHURINGKHU	1894	\N	000000
1	270747	Khuringmul	1894	00216800	270747
1	270887	Khusi Tampak	1895	00228600	270887
1	270908	K.Kangbung	1895	00230300	270908
1	270874	K.Molnom	1895	00227300	270874
1	270805	Komlathabi	1894	00221800	270805
1	270767	Komsen	1894	00218600	270767
1	270815	Kongpe (Kongpa)	1894	00222600	270815
2	270950	Kotal Khunthak	6496	00234100	270950
1	270862	Kotsophai	1895	00226300	270862
1	271001	Kovang	1895	00238300	271001
1	931149	Kowang	6496	\N	000000
1	270875	K.Phailen	1895	00227400	270875
1	270955	K.Savumpa	1895	00234500	270955
2	271010	K.Selhai	6496	00239100	271010
1	931143	K.Songgol	6496	\N	000000
2	270642	Kulyang	6496	00208700	270642
1	270791	Kurkam	1894	00220600	270791
1	270768	Kurnoching	1894	00218700	270768
1	931181	LAARPHUW	1894	\N	000000
2	271002	Laijang	6496	00238400	271002
1	270827	Lambung	1894	00223800	270827
1	931226	LAMKANG KHUNJAI	1894	\N	000000
1	270814	Lamkang Khunkha	1894	00222500	270814
1	270813	Lamkang Khunou	1894	00222400	270813
1	270817	Lamkang Khunthak	1894	00222800	270817
1	270828	Lamphou Chru	1894	00223900	270828
1	270786	Lamphou Pasana	1894	00220200	270786
1	931154	Lamsat	6496	\N	000000
1	270842	Langching	1895	00225200	270842
1	270834	Larong Khullen	1894	00224500	270834
1	931243	LARONG KHUNOU	1894	\N	000000
2	270971	L.Bongjoi	6496	00235800	270971
1	270881	L.Chengvol	1895	00228000	270881
1	931124	L.COLONY (DERINGKHU)	1894	\N	000000
1	931156	Leijingphai	6496	\N	000000
1	270765	Leingang Ching	1894	00218400	270765
1	270808	Leipung Tampak	1894	00222100	270808
2	270734	Leisan Tengnoupal	6496	00215900	270734
1	270809	Leishokching	1894	00222200	270809
1	931157	Lenlhang	6496	\N	000000
1	931151	L.Gelmol	6496	\N	000000
1	270913	Lhalpi	1895	00230800	270913
1	931159	LHANGPIKOT	6496	\N	000000
1	271003	Lh.Jangnomphai	1895	00238500	271003
1	931155	LH JANGNOMPHAI	6496	\N	000000
1	270843	Lhongchin	1895	00225200	270843
1	270839	Libung	1894	00225000	270839
1	270889	Limkhurim	1895	00228700	270889
1	931220	LIRUNGTABI	1894	\N	000000
1	270750	Litan	1894	00217000	270750
1	270804	Liwa Changning	1894	00221700	270804
1	270799	Liwa Khullen	1894	00221200	270799
1	270798	Liwa Maring	1894	00221100	270798
1	270797	Liwa Sarei	1894	00221000	270797
1	270906	L.Molhoi	1895	00230100	270906
1	931153	L.Mongjang	6496	\N	000000
1	270911	Longja	1895	00230600	270911
1	270949	Lonkhu	1895	00234000	270949
1	270856	Lonpi Khonou	1895	00226000	270856
1	270822	L.Thankam	1894	00223300	270822
1	270873	L.Thingkangphai	1895	00227200	270873
1	931231	LUNGHU	1894	\N	000000
1	931106	LUNGLEH	1894	\N	000000
1	931177	LUNGTIM	1894	\N	000000
1	931164	LV CHAMPHAI	6496	\N	000000
1	270825	Maha Centre Bazar (East)	1894	00223600	270825
1	270824	Maha Centre Bazar(West)	1894	00223500	270824
1	931129	MAHAMANI	1894	\N	000000
1	270766	Mahau Tera	1894	00218500	270766
1	931109	MANGKANG	1894	\N	000000
1	931114	MANTAK	1894	\N	000000
1	270820	Mantri Pantha	1894	00223100	270820
1	931168	MAOKOT	6496	\N	000000
1	270779	Maribung	1894	00219800	270779
1	931165	M. BIJANGPHAI	6496	\N	000000
1	931167	M. HOUPIJANG	6496	\N	000000
1	931180	MITONG RASANKHUR	1894	\N	000000
1	270818	Mittong	1894	00222900	270818
1	270864	M. Molnoi	1895	00226300	270864
1	270852	M. Munpi	1895	00225800	270852
1	270785	Modi	1894	00220100	270785
2	271006	Molcham	6496	00238700	271006
2	270974	Moldennom	6496	00236000	270974
2	270972	Molkon	6496	00235900	270972
1	270932	Mollen	1895	00232700	270932
1	270993	Molngat	1895	00237500	270993
1	931169	MOLNGAT	6496	\N	000000
1	270925	Molphei	1895	00232000	270925
1	270956	Molpibung	1895	00234600	270956
1	931170	MOLPIBUNG	6496	\N	000000
1	931172	MOLTUK	6496	\N	000000
1	270984	Mombi	1895	00236800	270984
1	931173	MOMBI	6496	\N	000000
1	270914	Mongjang	1895	00230900	270914
1	270819	Monsang Pantha	1894	00223000	270819
1	931176	M.SELZOL	1894	\N	000000
1	270934	M. Tolpijang	1895	00232800	270934
1	270863	M. Zozamveng	1895	00226300	270863
1	931184	NABIL	6496	\N	000000
1	270963	Nabin	1895	00235300	270963
1	270983	Nakong	1895	00236700	270983
1	931186	NAKONG	6496	\N	000000
1	270939	N.Angbuwng	1895	00233200	270939
1	931178	N. CHAMPHAI	6496	\N	000000
1	931188	NEW BONGMOL	6496	\N	000000
1	931190	new changpol	6496	\N	000000
1	270761	New Chayang	1894	00218000	270761
1	931125	New Gammon	6496	\N	000000
1	931185	NEW KHONGJON	1894	\N	000000
1	931115	NEW L. KHUNTHAK	1894	\N	000000
1	931192	NEW SAMTAL	6496	\N	000000
1	271004	New Somtal	1895	00238600	271004
1	270953	New Songjang	1895	00234300	270953
1	931193	NEW SONGJANG	6496	\N	000000
1	931139	New TS Laijang	6496	\N	000000
1	270802	New Wangparal	1894	00221500	270802
1	931194	NEW WAYANG	6496	\N	000000
1	270997	New Wayang (Changjal)	1895	00237900	270997
1	270777	Ngamkhu	1894	00219600	270777
1	270769	Nungkang Ching	1894	00218800	270769
1	270867	Nungpan	1895	00226600	270867
1	270778	Nungphura	1894	00219700	270778
1	270830	Oklu	1894	00224100	270830
1	270965	Old Changpol	1895	00235400	270965
1	931196	OLD CHANGPOL	6496	\N	000000
1	931228	OLD L. KHUNTHAK	1894	\N	000000
1	931197	OLD SAMTAL	6496	\N	000000
1	270803	Old Wangparal	1894	00221600	270803
1	270919	Paldai	1895	00231400	270919
1	270895	Pamtujang	1895	00229200	270895
1	270826	Panchai	1894	00223700	270826
1	931201	P.ANNAJANG	6496	\N	000000
1	270781	Papaam	1894	00219900	270781
1	270838	Paraolen	1894	00224900	270838
1	270954	P.Chehjang	1895	00234400	270954
1	931198	P. CHEHJANG	6496	\N	000000
1	270884	Peace Island	1895	00228300	270884
1	270806	Pena Ching	1894	00221900	270806
1	270879	Phaijang	1895	00227800	270879
1	270854	Phainom	1895	00225900	270854
1	931203	PHAIPHENGKOT	6496	\N	000000
1	270832	Phairan Khullen	1894	00224300	270832
1	270831	Phiran Leihao	1894	00224200	270831
1	270947	Phiranmachet	1895	00233900	270947
1	270926	Phoikon	1895	00232100	270926
1	270996	Phoilen	1895	00237800	270996
1	931204	PHOILEN	6496	\N	000000
1	270745	Phunansambum	1894	00216600	270745
1	931174	PHUNCHUNG	1894	\N	000000
1	931199	P. KHONOMPHAI	6496	\N	000000
1	270898	P.Khudam	1895	00229400	270898
1	931200	P.MONGNELJING	6496	\N	000000
1	270796	P. Ralringkhu	1894	00220900	270796
1	931205	PS KONGJANG	6496	\N	000000
1	931242	P. THAMLAPOKPI	1894	\N	000000
1	270904	P.Thumpajol	1895	00229900	270904
1	270807	Purum Chumbang	1894	00222000	270807
1	270752	Purum Khullen	1894	00217200	270752
1	270755	Purum Lainingkhul	1894	00217400	270755
1	270754	Purum Pantha	1894	00217300	270754
1	270751	Purum Tampak	1894	00217100	270751
1	270899	Ravalon	1895	00229400	270899
1	931135	REVERLANE	1894	\N	000000
1	931232	RINGKHU	1894	\N	000000
1	931161	RINGKHUMKHU	1894	\N	000000
1	931117	VOMKU	1894	\N	000000
1	270944	Royal Chakpi Bazar	1895	00233600	270944
1	270894	Rungchang	1895	00229200	270894
1	270849	Sahumphei	1895	00225600	270849
2	270980	Saibol Joupi	6496	00236500	270980
1	931442	Sailam	6496	\N	000000
1	931443	Saisam	6496	\N	000000
1	270921	Sajik Tampak	1895	00231600	270921
1	931189	SALEMTHAR	1894	\N	000000
1	271012	Sangni	1895	\N	271012
1	270900	Sarangtampak	1895	00229500	270900
1	270857	Saronphai	1895	00226000	270857
1	931206	S BONGJOI	6496	\N	000000
2	270977	Sehao	6496	00236200	270977
2	270995	Sehlon	6496	00237700	270995
2	271009	Sejang Theose	6496	00239000	271009
1	931229	SEKTAIKARONG	1894	\N	000000
1	270872	Selkui	1895	00227100	270872
2	270976	Semol	6496	00236100	270976
1	270897	Shalluk	1895	00229400	270897
1	931119	SHANGREIPHUNG	1894	\N	000000
1	931163	SINADAM	1894	\N	000000
1	270850	Singtom	1895	00225700	270850
1	931207	S JANGLENPHAI	6496	\N	000000
1	931208	S. KHOMUNNOM	6496	\N	000000
1	270957	S.Lamphei	1895	00234700	270957
1	931209	S. LAMPHEI	6496	\N	000000
1	931444	SL.Changpol	6496	\N	000000
1	931441	S.Lhangkichoi	6496	\N	000000
2	270985	S.Lhangnom	6496	00236900	270985
1	270922	S.Molnom	1895	00231700	270922
1	931445	SN.Munhoi	6496	\N	000000
1	270851	Sokom	1895	00225800	270851
1	931158	SOLAND	1894	\N	000000
2	270975	Songdop	6496	00236000	270975
2	270952	Songjang	6496	00234300	270952
1	270912	Songkong	1895	00230700	270912
1	270890	Sothum	1895	00228800	270890
1	270935	S.Sijang	1895	00232900	270935
1	270877	S.Thingkangphai	1895	00227600	270877
1	270847	Sugnu Lamhang	1895	00225500	270847
1	270846	Sugnu Lokhijang	1895	00225400	270846
1	270845	Sugnu Tribal	1895	00225400	270845
1	270844	Sugnu Zouveng	1895	00225300	270844
1	270880	Tampi	1895	00227900	270880
1	270816	Tarao Laimanai	1894	00222700	270816
1	270905	T.Bethel	1895	00230000	270905
2	270981	T.Bollon	6496	00236600	270981
1	270878	Teijang	1895	00227700	270878
1	270811	Thamlakhuren	1894	00222300	270811
1	270810	Thamnapokpi	1894	00222300	270810
1	270759	Thamnapokpi (K)	1894	00217800	270759
1	931111	THANGBUNG MINOU	1894	\N	000000
1	931224	THANGKIN	1894	\N	000000
1	270840	Thingbongphai	1894	00225100	270840
1	270959	Thingphai	1895	00234900	270959
1	931313	THINGPHAI	6496	\N	000000
1	270943	Thorcham	1895	00233600	270943
1	931126	THOTCHANRAM	1894	\N	000000
1	931183	THUMTAM	1894	\N	000000
1	270865	Thungcheng	1895	00226400	270865
1	931446	T.Jangnom	6496	\N	000000
1	931447	T.Khonom	6496	\N	000000
1	931448	T.Lhangjol	6496	\N	000000
1	931299	T. LHANGNOM	6496	\N	000000
1	931315	TL MAOJANG	6496	\N	000000
1	931317	TM DINGPI	6496	\N	000000
1	270823	T.Minou	1894	00223400	270823
2	270966	T.Monglen	6496	00235500	270966
1	931300	T. MONGLEN	6496	\N	000000
2	270967	T.Nampao	6496	00235600	270967
1	931302	T.NAMPAO	6496	\N	000000
2	270999	Toitung	6496	00238100	270999
1	270775	Tokpa Ching	1894	00219400	270775
2	270986	Tolbung	6496	00237000	270986
1	270771	Tonsen Khullen	1894	00219000	270771
1	270770	Tonsen Tampak	1894	00218900	270770
1	270866	Toupokpi	1895	00226500	270866
1	270916	T.Phaicham	1895	00231100	270916
1	931303	T.SAHEI GAMMON	6496	\N	000000
1	931305	T. SEJANG	6496	\N	000000
2	270917	T.Sijang	6496	00231200	270917
1	270960	Ts.Laijang	1895	00235000	270960
1	931141	TS laijang	6496	\N	000000
1	931306	T. SONGDOJANG	6496	\N	000000
1	931307	T. TUIVANG	6496	\N	000000
2	270958	Tuidam	6496	00234800	270958
2	270945	Tuikong	6496	00233700	270945
1	931202	TUILENG	6496	\N	000000
1	270901	Tuinou	1895	00229600	270901
1	931195	TUIPAJANG	6496	\N	000000
1	270858	Tuisamphai	1895	00226000	270858
1	931142	Tupiching	6496	\N	000000
1	270989	Tuyang	1895	00237200	270989
1	931191	TUYANG	6496	\N	000000
1	931310	T.VAKON	6496	\N	000000
1	931312	T.VENGNOM	6496	\N	000000
1	270855	Uchatampak	1895	00226000	270855
1	270746	Unapal	1894	00216700	270746
1	270774	Unopat	1894	00219300	270774
1	270861	Utangpokpi	1895	00226300	270861
1	270876	U.Thingkangphai	1895	00227500	270876
1	270869	V.Haipijang	1895	00226800	270869
1	931182	V. MONGJANG	6496	\N	000000
1	931175	WAILOU	6496	\N	000000
1	270998	Wayang	1895	00238000	270998
1	931160	WAYANG	6496	\N	000000
1	270970	Yangoulen	1895	00235700	270970
1	931152	Yangoulen	6496	\N	000000
1	270885	Y. Kutha	1895	00228400	270885
1	270928	Y.Phaisi	1895	00232300	270928
1	270870	Y.Thingkangphai	1895	00226900	270870
1	931150	Zalenmun	6496	\N	000000
1	931319	ZALENPHAI	6496	\N	000000
1	270821	Zaphou	1894	00223200	270821
1	270801	Zointlang	1894	00221400	270801
\.


--
-- Name: anganwadis Anganwadi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.anganwadis
    ADD CONSTRAINT "Anganwadi_pkey" PRIMARY KEY (anganwadi_id);


--
-- Name: education_infras Education_Infra_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.education_infras
    ADD CONSTRAINT "Education_Infra_pkey" PRIMARY KEY (education_infra_id);


--
-- Name: food_securities Food_Security_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.food_securities
    ADD CONSTRAINT "Food_Security_pkey" PRIMARY KEY (food_security_id);


--
-- Name: health_infras Health_Infra_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.health_infras
    ADD CONSTRAINT "Health_Infra_pkey" PRIMARY KEY (health_infra_id);


--
-- Name: users_roles Users_Role_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_roles
    ADD CONSTRAINT "Users_Role_pkey" PRIMARY KEY (users_role_id);


--
-- Name: users Users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT "Users_pkey" PRIMARY KEY (user_id);


--
-- Name: village_electorals Village_Electoral_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_electorals
    ADD CONSTRAINT "Village_Electoral_pkey" PRIMARY KEY (village_electoral_id);


--
-- Name: village_infos Village_Info_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_infos
    ADD CONSTRAINT "Village_Info_pkey" PRIMARY KEY (village_info_id);


--
-- Name: nregas Village_Nrega_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nregas
    ADD CONSTRAINT "Village_Nrega_pkey" PRIMARY KEY (village_nrega_id);


--
-- Name: village_nsaps Village_Nsap_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_nsaps
    ADD CONSTRAINT "Village_Nsap_pkey" PRIMARY KEY (village_nsap_id);


--
-- Name: village_schemes Village_Scheme_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_schemes
    ADD CONSTRAINT "Village_Scheme_pkey" PRIMARY KEY (village_scheme_id);


--
-- Name: villages Village_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.villages
    ADD CONSTRAINT "Village_pkey" PRIMARY KEY (village_code);


--
-- Name: agencies agencies_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.agencies
    ADD CONSTRAINT agencies_pkey PRIMARY KEY (agency_id);


--
-- Name: connectivity_infras connectivity_infras_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.connectivity_infras
    ADD CONSTRAINT connectivity_infras_pk PRIMARY KEY (id);


--
-- Name: populations pKey_populations; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.populations
    ADD CONSTRAINT "pKey_populations" PRIMARY KEY (reference_year, village_code, counting_agency);


--
-- Name: departments pkey_departments; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departments
    ADD CONSTRAINT pkey_departments PRIMARY KEY (id);


--
-- Name: fileuploads pkey_file_uploads; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fileuploads
    ADD CONSTRAINT pkey_file_uploads PRIMARY KEY (id);


--
-- Name: village_photos pkey_fileuploads_village_photos; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_photos
    ADD CONSTRAINT pkey_fileuploads_village_photos PRIMARY KEY (id);


--
-- Name: formcategories pkey_form_categories; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.formcategories
    ADD CONSTRAINT pkey_form_categories PRIMARY KEY (id);


--
-- Name: schemes pkey_schemes; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schemes
    ADD CONSTRAINT pkey_schemes PRIMARY KEY (scheme_code);


--
-- Name: power_infras power_infras_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.power_infras
    ADD CONSTRAINT power_infras_pk PRIMARY KEY (id);


--
-- Name: subdistricts subdistrict_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subdistricts
    ADD CONSTRAINT subdistrict_pkey PRIMARY KEY (subdistrict_code);


--
-- Name: village_disable_infos village_disable_info_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_disable_infos
    ADD CONSTRAINT village_disable_info_pk PRIMARY KEY (id);


--
-- Name: fki_fkey_departments_schemes; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_fkey_departments_schemes ON public.schemes USING btree (department_id);


--
-- Name: fki_fkey_population_agencies; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_fkey_population_agencies ON public.populations USING btree (counting_agency);


--
-- Name: fki_fkey_schemes_village_schemes; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_fkey_schemes_village_schemes ON public.village_schemes USING btree (scheme_code);


--
-- Name: fki_fkey_users_users_role; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_fkey_users_users_role ON public.users USING btree (role_id);


--
-- Name: fki_fkey_villages_anganwadis; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_fkey_villages_anganwadis ON public.anganwadis USING btree (village_code);


--
-- Name: fki_fkey_villages_populations; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_fkey_villages_populations ON public.populations USING btree (village_code);


--
-- Name: fki_fkey_villages_village_photos; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_fkey_villages_village_photos ON public.village_photos USING btree (village_code);


--
-- Name: fki_villages_conectivity_infra_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_villages_conectivity_infra_fk ON public.connectivity_infras USING btree (village_code);


--
-- Name: fki_villages_disable_info_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_villages_disable_info_fk ON public.village_disable_infos USING btree (village_code);


--
-- Name: fki_villages_power_infras_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_villages_power_infras_fk ON public.power_infras USING btree (village_code);


--
-- Name: village_schemes Village_Scheme_village_code_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_schemes
    ADD CONSTRAINT "Village_Scheme_village_code_fkey" FOREIGN KEY (village_code) REFERENCES public.villages(village_code);


--
-- Name: populations fkey_agencies_populations; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.populations
    ADD CONSTRAINT fkey_agencies_populations FOREIGN KEY (counting_agency) REFERENCES public.agencies(agency_id);


--
-- Name: schemes fkey_departments_schemes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schemes
    ADD CONSTRAINT fkey_departments_schemes FOREIGN KEY (department_id) REFERENCES public.departments(id);


--
-- Name: village_schemes fkey_schemes_village_schemes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_schemes
    ADD CONSTRAINT fkey_schemes_village_schemes FOREIGN KEY (scheme_code) REFERENCES public.schemes(scheme_code);


--
-- Name: users fkey_users_users_role; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fkey_users_users_role FOREIGN KEY (role_id) REFERENCES public.users_roles(users_role_id);


--
-- Name: anganwadis fkey_villages_anganwadis; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.anganwadis
    ADD CONSTRAINT fkey_villages_anganwadis FOREIGN KEY (village_code) REFERENCES public.villages(village_code);


--
-- Name: populations fkey_villages_populations; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.populations
    ADD CONSTRAINT fkey_villages_populations FOREIGN KEY (village_code) REFERENCES public.villages(village_code);


--
-- Name: village_photos fkey_villages_village_photos; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_photos
    ADD CONSTRAINT fkey_villages_village_photos FOREIGN KEY (village_code) REFERENCES public.villages(village_code);


--
-- Name: connectivity_infras villages_conectivity_infra_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.connectivity_infras
    ADD CONSTRAINT villages_conectivity_infra_fk FOREIGN KEY (village_code) REFERENCES public.villages(village_code);


--
-- Name: village_disable_infos villages_disable_info_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.village_disable_infos
    ADD CONSTRAINT villages_disable_info_fk FOREIGN KEY (village_code) REFERENCES public.villages(village_code);


--
-- Name: power_infras villages_power_infras_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.power_infras
    ADD CONSTRAINT villages_power_infras_fk FOREIGN KEY (village_code) REFERENCES public.villages(village_code);


--
-- PostgreSQL database dump complete
--

