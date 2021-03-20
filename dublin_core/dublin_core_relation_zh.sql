--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_relation (id, relation, definition) FROM stdin;
1	替换者	用于取代，废弃或取代所描述资源的相关资源。
2	是以下格式的格式	先前存在的相关资源，与描述的资源基本相同，但采用另一种格式。
3	属于	所描述资源在物理上或逻辑上包括的相关资源。
4	被引用	引用，引用或以其他方式指向所述资源的相关资源。
5	需要者	需要描述资源以支持其功能，交付或一致性的相关资源。
6	是以下版本的版本	描述的资源是版本，版本或适配的相关资源。
7	具有格式	与预先存在的描述资源基本相同的相关资源，但采用另一种格式。
8	具有部件	在所描述资源中物理或逻辑包含的相关资源。
9	具有版本	是描述的资源的版本，版本或适配的相关资源。
\.

SELECT setval('dublin_core_relation_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

