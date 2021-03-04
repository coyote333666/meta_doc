--
-- PostgreSQL database dump
--

-- Dumped from database version 12.5
-- Dumped by pg_dump version 12.6 (Ubuntu 12.6-0ubuntu0.20.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.admin (
    id integer NOT NULL,
    username character varying(180) NOT NULL,
    roles json NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE public.admin OWNER TO main;

--
-- Name: admin_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.admin_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.admin_id_seq OWNER TO main;

--
-- Name: classification; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.classification (
    id integer NOT NULL,
    code character varying(50) NOT NULL,
    description text,
    title character varying(500) NOT NULL
);


ALTER TABLE public.classification OWNER TO main;

--
-- Name: classification_admin; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.classification_admin (
    classification_id integer NOT NULL,
    admin_id integer NOT NULL
);


ALTER TABLE public.classification_admin OWNER TO main;

--
-- Name: classification_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.classification_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.classification_id_seq OWNER TO main;

--
-- Name: doctrine_migration_versions; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.doctrine_migration_versions (
    version character varying(191) NOT NULL,
    executed_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    execution_time integer
);


ALTER TABLE public.doctrine_migration_versions OWNER TO main;

--
-- Name: document; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.document (
    id integer NOT NULL,
    slug character varying(500) DEFAULT NULL::character varying NOT NULL,
    text text,
    title character varying(255) NOT NULL,
    start_date date NOT NULL,
    end_date date,
    state character varying(255) DEFAULT NULL::character varying,
    uri character varying(4000) DEFAULT NULL::character varying,
    version character varying(20) DEFAULT NULL::character varying,
    classification_id integer NOT NULL
);


ALTER TABLE public.document OWNER TO main;

--
-- Name: document_document; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.document_document (
    id integer NOT NULL,
    dublin_core_id integer,
    document_source_id integer NOT NULL,
    document_target_id integer NOT NULL
);


ALTER TABLE public.document_document OWNER TO main;

--
-- Name: document_document_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.document_document_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.document_document_id_seq OWNER TO main;

--
-- Name: document_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.document_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.document_id_seq OWNER TO main;

--
-- Name: document_metadata; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.document_metadata (
    document_id integer NOT NULL,
    metadata_id integer NOT NULL
);


ALTER TABLE public.document_metadata OWNER TO main;

--
-- Name: dublin_core; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.dublin_core (
    id integer NOT NULL,
    element character varying(50) NOT NULL,
    is_related boolean NOT NULL,
    definition character varying(4000) DEFAULT NULL::character varying
);


ALTER TABLE public.dublin_core OWNER TO main;

--
-- Name: dublin_core_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.dublin_core_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dublin_core_id_seq OWNER TO main;

--
-- Name: metadata; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.metadata (
    id integer NOT NULL,
    code character varying(50) NOT NULL,
    description character varying(4000) DEFAULT NULL::character varying,
    dublin_core_id integer
);


ALTER TABLE public.metadata OWNER TO main;

--
-- Name: metadata_classification; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.metadata_classification (
    metadata_id integer NOT NULL,
    classification_id integer NOT NULL
);


ALTER TABLE public.metadata_classification OWNER TO main;

--
-- Name: metadata_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.metadata_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.metadata_id_seq OWNER TO main;

--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.admin (id, username, roles, password) FROM stdin;
1	admin	["ROLE_ADMIN"]	$argon2id$v=19$m=65536,t=4,p=1$pXnVrkFDGFMCrsKEgF2ycw$dDq8lHi5lZ2VHIudPn7OfmDUeEkBOUsVtByZNQbKosc
\.


--
-- Data for Name: classification; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.classification (id, code, description, title) FROM stdin;
2	00001	Premier noeud	Classification test premier noeud
1	00000	Noeud racine home.	Home
\.


--
-- Data for Name: classification_admin; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.classification_admin (classification_id, admin_id) FROM stdin;
\.


--
-- Data for Name: doctrine_migration_versions; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.doctrine_migration_versions (version, executed_at, execution_time) FROM stdin;
DoctrineMigrations\\Version20210201220955	2021-02-09 22:27:18	23
DoctrineMigrations\\Version20210202185651	2021-02-09 22:27:18	0
DoctrineMigrations\\Version20210202190152	2021-02-09 22:27:18	0
DoctrineMigrations\\Version20210202190506	2021-02-09 22:27:18	0
DoctrineMigrations\\Version20210202195906	2021-02-09 22:36:33	20
DoctrineMigrations\\Version20210206174641	2021-02-09 22:36:33	33
DoctrineMigrations\\Version20210208010344	2021-02-09 22:36:33	4
DoctrineMigrations\\Version20210208010847	2021-02-09 22:36:33	8
DoctrineMigrations\\Version20210208011128	2021-02-09 22:36:33	7
DoctrineMigrations\\Version20210208011426	2021-02-09 22:36:33	8
DoctrineMigrations\\Version20210208162139	2021-02-09 22:36:33	12
DoctrineMigrations\\Version20210208165150	2021-02-09 22:36:33	12
DoctrineMigrations\\Version20210208165349	2021-02-09 22:36:33	12
DoctrineMigrations\\Version20210208170216	2021-02-09 22:36:33	4
DoctrineMigrations\\Version20210208172449	2021-02-09 22:36:33	4
DoctrineMigrations\\Version20210209034327	2021-02-09 22:36:33	1
DoctrineMigrations\\Version20210209034857	2021-02-09 22:36:33	8
DoctrineMigrations\\Version20210209035132	2021-02-09 22:36:33	0
DoctrineMigrations\\Version20210209035757	2021-02-09 22:36:33	1
DoctrineMigrations\\Version20210209042028	2021-02-09 22:36:33	10
DoctrineMigrations\\Version20210209042613	2021-02-09 22:36:33	10
DoctrineMigrations\\Version20210209043949	2021-02-09 22:36:33	5
DoctrineMigrations\\Version20210209044208	2021-02-10 11:43:46	32
DoctrineMigrations\\Version20210210164308	2021-02-10 11:58:50	14
DoctrineMigrations\\Version20210209044542	\N	\N
DoctrineMigrations\\Version20210209044744	\N	\N
DoctrineMigrations\\Version20210209045122	\N	\N
DoctrineMigrations\\Version20210209130008	\N	\N
DoctrineMigrations\\Version20210210032647	\N	\N
DoctrineMigrations\\Version20210210033801	\N	\N
DoctrineMigrations\\Version20210210173151	2021-02-10 12:32:51	70
DoctrineMigrations\\Version20210211180353	2021-02-11 13:03:57	29
DoctrineMigrations\\Version20210211181752	2021-02-11 13:23:50	28
DoctrineMigrations\\Version20210211193342	2021-02-11 14:33:50	11
DoctrineMigrations\\Version20210215030744	2021-02-14 22:08:31	39
DoctrineMigrations\\Version20210215143900	2021-02-15 09:47:37	10
DoctrineMigrations\\Version20210215144731	2021-02-15 09:47:37	3
DoctrineMigrations\\Version20210215151214	2021-02-15 10:12:45	10
DoctrineMigrations\\Version20210215151403	2021-02-15 10:14:28	31
DoctrineMigrations\\Version20210216201118	\N	\N
DoctrineMigrations\\Version20210216201318	\N	\N
DoctrineMigrations\\Version20210216201927	2021-02-16 15:19:49	9
DoctrineMigrations\\Version20210216233711	2021-02-16 18:37:22	36
DoctrineMigrations\\Version20210218202418	2021-02-18 15:26:04	35
DoctrineMigrations\\Version20210218203542	2021-02-18 15:36:03	9
DoctrineMigrations\\Version20210219020958	2021-02-18 21:21:21	55
DoctrineMigrations\\Version20210219192742	2021-02-19 14:30:37	13
DoctrineMigrations\\Version20210222150730	2021-02-22 10:08:51	51
DoctrineMigrations\\Version20210224201307	2021-02-24 15:13:47	15
DoctrineMigrations\\Version20210225022748	2021-02-24 21:30:51	27
DoctrineMigrations\\Version20210302163534	\N	\N
DoctrineMigrations\\Version20210302163807	\N	\N
DoctrineMigrations\\Version20210302164225	2021-03-02 11:43:10	32
DoctrineMigrations\\Version20210302164651	2021-03-02 11:47:09	24
DoctrineMigrations\\Version20210302184354	2021-03-02 13:43:59	10
\.


--
-- Data for Name: document; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document (id, slug, text, title, start_date, end_date, state, uri, version, classification_id) FROM stdin;
2	doc-cla-00001-test-2-2021-02-12	doc cla 00001 text test text test tess test long tès long	doc cla 00001 test 2	2021-02-12	\N	\N	\N	\N	2
1	1	doc cla 00000\r\ntest_commentaire	doc cla 000000	2021-02-10	\N	en travail	\N	\N	1
3	test-2021-02-16	test	test	2021-02-16	\N	\N	\N	\N	1
4	vf-test-2021-02-16	test 346	vf test	2021-02-16	2018-02-03	en cours	\N	\N	1
6	vf-test-3-2021-02-16	test 346	vf test 3	2021-02-16	2018-02-03	en cours	\N	\N	1
7	test-4-2021-02-16	test 4	test 4	2021-02-16	\N	\N	\N	\N	1
9	test-5-2021-02-16	test 5	test 5	2021-02-16	\N	\N	\N	\N	1
\.


--
-- Data for Name: document_document; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document_document (id, dublin_core_id, document_source_id, document_target_id) FROM stdin;
\.


--
-- Data for Name: document_metadata; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document_metadata (document_id, metadata_id) FROM stdin;
\.


--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core (id, element, is_related, definition) FROM stdin;
1	Title	f	<div>A name given to the resource</div>
2	Subject	f	<div><br>The topic of the resource.</div>
3	Description	f	An account of the resource.
4	Creator	f	An entity primarily responsible for making the resource.
5	Publisher	f	An entity responsible for making the resource available.
6	Contributor	f	An entity responsible for making contributions to the resource.
7	Date	f	A point or period of time associated with an event in the lifecycle of the resource.
8	Type	f	The nature or genre of the resource.
9	Format	f	The file format, physical medium, or dimensions of the resource.
10	Identifier	f	An unambiguous reference to the resource within a given context.
11	Source	f	A related resource from which the described resource is derived.
12	Language	f	A language of the resource.
13	Relation	f	A related resource.
14	Coverage	f	The spatial or temporal topic of the resource, the spatial applicability of the resource, or the jurisdiction under which the resource is relevant.
15	Rights	f	Information about rights held in and over the resource.
19	isReplacedBy	t	A related resource that supplants, displaces, or supersedes the described resource.
16	isFormatOf	t	A pre-existing related resource that is substantially the same as the described resource, but in another format.
17	isPartOf	t	A related resource in which the described resource is physically or logically included.
18	isReferencedBy	t	A related resource that references, cites, or otherwise points to the described resource.
20	isRequiredBy	t	A related resource that requires the described resource to support its function, delivery, or coherence.
21	issued	t	Date of formal issuance of the resource.
22	isVersionOf	t	A related resource of which the described resource is a version, edition, or adaptation.
23	hasFormat	t	A related resource that is substantially the same as the pre-existing described resource, but in another format.
24	hasPart	t	A related resource that is included either physically or logically in the described resource.
25	hasVersion	t	A related resource that is a version, edition, or adaptation of the described resource.
\.


--
-- Data for Name: metadata; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.metadata (id, code, description, dublin_core_id) FROM stdin;
\.


--
-- Data for Name: metadata_classification; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.metadata_classification (metadata_id, classification_id) FROM stdin;
\.


--
-- Name: admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.admin_id_seq', 1, true);


--
-- Name: classification_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.classification_id_seq', 2, true);


--
-- Name: document_document_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.document_document_id_seq', 1, false);


--
-- Name: document_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.document_id_seq', 9, true);


--
-- Name: dublin_core_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.dublin_core_id_seq', 25, true);


--
-- Name: metadata_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.metadata_id_seq', 1, false);


--
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id);


--
-- Name: classification_admin classification_admin_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.classification_admin
    ADD CONSTRAINT classification_admin_pkey PRIMARY KEY (classification_id, admin_id);


--
-- Name: classification classification_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.classification
    ADD CONSTRAINT classification_pkey PRIMARY KEY (id);


--
-- Name: doctrine_migration_versions doctrine_migration_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.doctrine_migration_versions
    ADD CONSTRAINT doctrine_migration_versions_pkey PRIMARY KEY (version);


--
-- Name: document_document document_document_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_document
    ADD CONSTRAINT document_document_pkey PRIMARY KEY (id);


--
-- Name: document_metadata document_metadata_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_metadata
    ADD CONSTRAINT document_metadata_pkey PRIMARY KEY (document_id, metadata_id);


--
-- Name: document document_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document
    ADD CONSTRAINT document_pkey PRIMARY KEY (id);


--
-- Name: dublin_core dublin_core_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.dublin_core
    ADD CONSTRAINT dublin_core_pkey PRIMARY KEY (id);


--
-- Name: metadata_classification metadata_classification_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata_classification
    ADD CONSTRAINT metadata_classification_pkey PRIMARY KEY (metadata_id, classification_id);


--
-- Name: metadata metadata_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata
    ADD CONSTRAINT metadata_pkey PRIMARY KEY (id);


--
-- Name: classification_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX classification_uk ON public.classification USING btree (code);


--
-- Name: document_document_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX document_document_uk ON public.document_document USING btree (document_source_id, document_target_id, dublin_core_id);


--
-- Name: dublin_core_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX dublin_core_uk ON public.dublin_core USING btree (element);


--
-- Name: idx_4f1434141df597a7; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_4f1434141df597a7 ON public.metadata USING btree (dublin_core_id);


--
-- Name: idx_57a87b2f1df597a7; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_57a87b2f1df597a7 ON public.document_document USING btree (dublin_core_id);


--
-- Name: idx_57a87b2f7b623c7; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_57a87b2f7b623c7 ON public.document_document USING btree (document_target_id);


--
-- Name: idx_57a87b2f870434c0; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_57a87b2f870434c0 ON public.document_document USING btree (document_source_id);


--
-- Name: idx_a45326f22a86559f; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_a45326f22a86559f ON public.classification_admin USING btree (classification_id);


--
-- Name: idx_a45326f2642b8210; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_a45326f2642b8210 ON public.classification_admin USING btree (admin_id);


--
-- Name: idx_c0d5c54dc33f7837; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_c0d5c54dc33f7837 ON public.document_metadata USING btree (document_id);


--
-- Name: idx_c0d5c54ddc9ee959; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_c0d5c54ddc9ee959 ON public.document_metadata USING btree (metadata_id);


--
-- Name: idx_d33f5af02a86559f; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_d33f5af02a86559f ON public.metadata_classification USING btree (classification_id);


--
-- Name: idx_d33f5af0dc9ee959; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_d33f5af0dc9ee959 ON public.metadata_classification USING btree (metadata_id);


--
-- Name: idx_d8698a762a86559f; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_d8698a762a86559f ON public.document USING btree (classification_id);


--
-- Name: metadata_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX metadata_uk ON public.metadata USING btree (code);


--
-- Name: uniq_880e0d76f85e0677; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX uniq_880e0d76f85e0677 ON public.admin USING btree (username);


--
-- Name: uniq_d8698a76989d9b62; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX uniq_d8698a76989d9b62 ON public.document USING btree (slug);


--
-- Name: metadata fk_4f1434141df597a7; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata
    ADD CONSTRAINT fk_4f1434141df597a7 FOREIGN KEY (dublin_core_id) REFERENCES public.dublin_core(id);


--
-- Name: document_document fk_57a87b2f1df597a7; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_document
    ADD CONSTRAINT fk_57a87b2f1df597a7 FOREIGN KEY (dublin_core_id) REFERENCES public.dublin_core(id);


--
-- Name: document_document fk_57a87b2f7b623c7; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_document
    ADD CONSTRAINT fk_57a87b2f7b623c7 FOREIGN KEY (document_target_id) REFERENCES public.document(id);


--
-- Name: document_document fk_57a87b2f870434c0; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_document
    ADD CONSTRAINT fk_57a87b2f870434c0 FOREIGN KEY (document_source_id) REFERENCES public.document(id);


--
-- Name: classification_admin fk_a45326f22a86559f; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.classification_admin
    ADD CONSTRAINT fk_a45326f22a86559f FOREIGN KEY (classification_id) REFERENCES public.classification(id) ON DELETE CASCADE;


--
-- Name: classification_admin fk_a45326f2642b8210; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.classification_admin
    ADD CONSTRAINT fk_a45326f2642b8210 FOREIGN KEY (admin_id) REFERENCES public.admin(id) ON DELETE CASCADE;


--
-- Name: document_metadata fk_c0d5c54dc33f7837; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_metadata
    ADD CONSTRAINT fk_c0d5c54dc33f7837 FOREIGN KEY (document_id) REFERENCES public.document(id) ON DELETE CASCADE;


--
-- Name: document_metadata fk_c0d5c54ddc9ee959; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_metadata
    ADD CONSTRAINT fk_c0d5c54ddc9ee959 FOREIGN KEY (metadata_id) REFERENCES public.metadata(id) ON DELETE CASCADE;


--
-- Name: metadata_classification fk_d33f5af02a86559f; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata_classification
    ADD CONSTRAINT fk_d33f5af02a86559f FOREIGN KEY (classification_id) REFERENCES public.classification(id) ON DELETE CASCADE;


--
-- Name: metadata_classification fk_d33f5af0dc9ee959; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata_classification
    ADD CONSTRAINT fk_d33f5af0dc9ee959 FOREIGN KEY (metadata_id) REFERENCES public.metadata(id) ON DELETE CASCADE;


--
-- Name: document fk_d8698a762a86559f; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document
    ADD CONSTRAINT fk_d8698a762a86559f FOREIGN KEY (classification_id) REFERENCES public.classification(id);


--
-- PostgreSQL database dump complete
--

