--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_element (id, element, definition) FROM stdin;
1	标题	为资源指定的名称。
2	主题	资源的主题。
3	描述	资源的帐户。
4	创建者	主要负责提供资源的实体。
5	出版商	负责使资源可用的实体。
6	供款人	负责对资源作出贡献的实体。
7	日期	与资源生命周期中的事件相关联的时间点或时间段。
8	类型	资源的性质或类型。
9	格式	资源的文件格式，物理介质或维度。
10	标识	对给定上下文中的资源的明确引用。
11	来源	派生所述资源的相关资源。
12	语文	资源的语言。
13	关系	相关资源。
14	覆盖范围	资源的空间或时间主题，资源的空间适用性，或资源相关的管辖区域。
15	权利	有关在资源和资源上持有的权限的信息。
16	发行	正式印发资源的日期。
\.

SELECT setval('dublin_core_element_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

