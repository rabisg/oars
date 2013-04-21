--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- Name: course_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE course_type AS ENUM (
    'Compulsory',
    'Dept Elective',
    'Open Elective',
    'HSS Elective',
    'Science Elective'
);


ALTER TYPE public.course_type OWNER TO postgres;

--
-- Name: department; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE department AS ENUM (
    'Computer Science and Engineering',
    'Electrical Engineering',
    'Mechanical Engineering',
    'Civil Engineering',
    'Aerospace Engineering',
    'Biological Sciences and Bio-Engineering',
    'Chemical Engineering',
    'Environmental Engineering',
    'Industrial and Management Engineering',
    'Materials and Metallurgical Engineering',
    'Material Science and Engineering',
    'Humanities and Social Sciences',
    'Chemistry',
    'Physics',
    'Statistics',
    'Mathematics and Statistics'
);


ALTER TYPE public.department OWNER TO postgres;

--
-- Name: gender; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE gender AS ENUM (
    'Male',
    'Female'
);


ALTER TYPE public.gender OWNER TO postgres;

--
-- Name: hall; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE hall AS ENUM (
    '1',
    '2',
    '3',
    '4',
    '5',
    'GH2',
    '7',
    '8',
    '9',
    '10',
    'GH1'
);


ALTER TYPE public.hall OWNER TO postgres;

--
-- Name: meeting_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE meeting_type AS ENUM (
    'Lecture',
    'Lab',
    'Tutorial'
);


ALTER TYPE public.meeting_type OWNER TO postgres;

--
-- Name: positive; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN positive AS real NOT NULL DEFAULT 0
	CONSTRAINT positive_check CHECK ((VALUE >= (0.0)::double precision));


ALTER DOMAIN public.positive OWNER TO postgres;

--
-- Name: program; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE program AS ENUM (
    'B.Tech',
    'M.Tech',
    'MBA',
    'M.Des',
    'M.Sc',
    'PhD'
);


ALTER TYPE public.program OWNER TO postgres;

--
-- Name: regn_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE regn_type AS ENUM (
    'Repeat',
    'Substitute',
    'Normal'
);


ALTER TYPE public.regn_type OWNER TO postgres;

--
-- Name: request_status; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE request_status AS ENUM (
    'Accepted',
    'Rejected',
    'Meet Instructor',
    'Pending'
);


ALTER TYPE public.request_status OWNER TO postgres;

--
-- Name: semester; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE semester AS ENUM (
    'I',
    'II',
    'III'
);


ALTER TYPE public.semester OWNER TO postgres;

--
-- Name: TYPE semester; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TYPE semester IS 'III stands for Summer offering of courses';


--
-- Name: weekday; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE weekday AS ENUM (
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
    'Sunday'
);


ALTER TYPE public.weekday OWNER TO postgres;

--
-- Name: whole_num; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN whole_num AS integer NOT NULL DEFAULT 0
	CONSTRAINT whole_num_check CHECK ((VALUE >= 0));


ALTER DOMAIN public.whole_num OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: Admin; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Admin" (
    adminid integer NOT NULL,
    email character varying(64) NOT NULL,
    name character varying(64)
);


ALTER TABLE public."Admin" OWNER TO postgres;

--
-- Name: Admin_adminid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "Admin_adminid_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Admin_adminid_seq" OWNER TO postgres;

--
-- Name: Admin_adminid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "Admin_adminid_seq" OWNED BY "Admin".adminid;


--
-- Name: Course; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Course" (
    course_no character varying(8) NOT NULL,
    title character varying(64) NOT NULL,
    hrs_of_lecture positive,
    hrs_of_tutorial positive,
    hrs_of_labs positive,
    units whole_num NOT NULL,
    syllabus text
);


ALTER TABLE public."Course" OWNER TO postgres;

--
-- Name: CourseOffering; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "CourseOffering" (
    course_no character varying(8) NOT NULL,
    semester semester NOT NULL,
    acad_year character(7) NOT NULL,
    course_offering integer NOT NULL
);


ALTER TABLE public."CourseOffering" OWNER TO postgres;

--
-- Name: COLUMN "CourseOffering".acad_year; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "CourseOffering".acad_year IS 'Should be of the form 20xx-yy';


--
-- Name: CourseOffering_course_offering_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "CourseOffering_course_offering_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."CourseOffering_course_offering_seq" OWNER TO postgres;

--
-- Name: CourseOffering_course_offering_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "CourseOffering_course_offering_seq" OWNED BY "CourseOffering".course_offering;


--
-- Name: CourseRequest; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "CourseRequest" (
    roll_no character varying(8) NOT NULL,
    course_offering integer NOT NULL,
    regn_type regn_type NOT NULL,
    course_type course_type NOT NULL,
    status request_status DEFAULT 'Pending'::request_status
);


ALTER TABLE public."CourseRequest" OWNER TO postgres;

--
-- Name: Faculty; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Faculty" (
    faculty_id integer NOT NULL,
    name character varying(64) NOT NULL,
    gender gender NOT NULL,
    office_bldg character varying(64),
    room_no character varying(8),
    department department,
    email character varying(64) NOT NULL
);


ALTER TABLE public."Faculty" OWNER TO postgres;

--
-- Name: Faculty_faculty_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "Faculty_faculty_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Faculty_faculty_id_seq" OWNER TO postgres;

--
-- Name: Faculty_faculty_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "Faculty_faculty_id_seq" OWNED BY "Faculty".faculty_id;


--
-- Name: GradePoints; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "GradePoints" (
    grade_letter character varying(4) NOT NULL,
    points integer,
    CONSTRAINT valid_points CHECK (((points >= 0) AND (points <= 10)))
);


ALTER TABLE public."GradePoints" OWNER TO postgres;

--
-- Name: IITKFaculty; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "IITKFaculty" (
    faculty_id integer,
    emp_no character varying(16) NOT NULL
);


ALTER TABLE public."IITKFaculty" OWNER TO postgres;

--
-- Name: Instructor; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Instructor" (
    course_offering integer NOT NULL,
    faculty_id integer,
    roll_no character varying(8),
    incharge character(1)
);


ALTER TABLE public."Instructor" OWNER TO postgres;

--
-- Name: COLUMN "Instructor".incharge; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "Instructor".incharge IS 'Y/N';


--
-- Name: PreRequisite; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "PreRequisite" (
    course_no character varying(8),
    req_course_no character varying(8)
);


ALTER TABLE public."PreRequisite" OWNER TO postgres;

--
-- Name: Registration; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Registration" (
    roll_no character varying(8) NOT NULL,
    course_offering integer NOT NULL,
    regn_type regn_type NOT NULL,
    course_type course_type NOT NULL,
    grade character varying(4)
);


ALTER TABLE public."Registration" OWNER TO postgres;

--
-- Name: Student; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Student" (
    name character varying(64) NOT NULL,
    roll_no character varying(8) NOT NULL,
    hall_no hall NOT NULL,
    room_no character varying(8) NOT NULL,
    gender gender NOT NULL,
    program program NOT NULL,
    department department NOT NULL,
    email character varying(64) NOT NULL
);


ALTER TABLE public."Student" OWNER TO postgres;

--
-- Name: TimeTable; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "TimeTable" (
    course_offering integer,
    meeting_type meeting_type NOT NULL,
    start_time time without time zone NOT NULL,
    duration interval NOT NULL,
    day weekday NOT NULL,
    location character varying(64) NOT NULL
);


ALTER TABLE public."TimeTable" OWNER TO postgres;

--
-- Name: VisitingFaculty; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "VisitingFaculty" (
    faculty_id integer,
    university character varying(64)
);


ALTER TABLE public."VisitingFaculty" OWNER TO postgres;

--
-- Name: adminid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Admin" ALTER COLUMN adminid SET DEFAULT nextval('"Admin_adminid_seq"'::regclass);


--
-- Name: course_offering; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "CourseOffering" ALTER COLUMN course_offering SET DEFAULT nextval('"CourseOffering_course_offering_seq"'::regclass);


--
-- Name: faculty_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Faculty" ALTER COLUMN faculty_id SET DEFAULT nextval('"Faculty_faculty_id_seq"'::regclass);


--
-- Name: Admin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Admin"
    ADD CONSTRAINT "Admin_pkey" PRIMARY KEY (adminid, email);


--
-- Name: CourseOffering_course_no_semester_acad_year_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "CourseOffering"
    ADD CONSTRAINT "CourseOffering_course_no_semester_acad_year_key" UNIQUE (course_no, semester, acad_year);


--
-- Name: CourseOffering_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "CourseOffering"
    ADD CONSTRAINT "CourseOffering_pkey" PRIMARY KEY (course_offering);


--
-- Name: CourseRequest_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "CourseRequest"
    ADD CONSTRAINT "CourseRequest_pkey" PRIMARY KEY (roll_no, course_offering);


--
-- Name: Course_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Course"
    ADD CONSTRAINT "Course_pkey" PRIMARY KEY (course_no);


--
-- Name: Faculty_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Faculty"
    ADD CONSTRAINT "Faculty_pkey" PRIMARY KEY (faculty_id);


--
-- Name: GradePoints_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "GradePoints"
    ADD CONSTRAINT "GradePoints_pkey" PRIMARY KEY (grade_letter);


--
-- Name: IITKFaculty_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "IITKFaculty"
    ADD CONSTRAINT "IITKFaculty_pkey" PRIMARY KEY (emp_no);


--
-- Name: Registration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Registration"
    ADD CONSTRAINT "Registration_pkey" PRIMARY KEY (roll_no, course_offering);


--
-- Name: Student_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Student"
    ADD CONSTRAINT "Student_pkey" PRIMARY KEY (roll_no);


--
-- Name: CourseOffering_course_no_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "CourseOffering"
    ADD CONSTRAINT "CourseOffering_course_no_fkey" FOREIGN KEY (course_no) REFERENCES "Course"(course_no) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: CourseRequest_course_offering_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "CourseRequest"
    ADD CONSTRAINT "CourseRequest_course_offering_fkey" FOREIGN KEY (course_offering) REFERENCES "CourseOffering"(course_offering) ON DELETE CASCADE;


--
-- Name: CourseRequest_roll_no_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "CourseRequest"
    ADD CONSTRAINT "CourseRequest_roll_no_fkey" FOREIGN KEY (roll_no) REFERENCES "Student"(roll_no) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: IITKFaculty_faculty_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "IITKFaculty"
    ADD CONSTRAINT "IITKFaculty_faculty_id_fkey" FOREIGN KEY (faculty_id) REFERENCES "Faculty"(faculty_id);


--
-- Name: Instructor_course_offering_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Instructor"
    ADD CONSTRAINT "Instructor_course_offering_fkey" FOREIGN KEY (course_offering) REFERENCES "CourseOffering"(course_offering) ON DELETE CASCADE;


--
-- Name: Instructor_faculty_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Instructor"
    ADD CONSTRAINT "Instructor_faculty_id_fkey" FOREIGN KEY (faculty_id) REFERENCES "Faculty"(faculty_id) ON UPDATE CASCADE;


--
-- Name: Instructor_roll_no_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Instructor"
    ADD CONSTRAINT "Instructor_roll_no_fkey" FOREIGN KEY (roll_no) REFERENCES "Student"(roll_no);


--
-- Name: PreRequisite_course_no_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "PreRequisite"
    ADD CONSTRAINT "PreRequisite_course_no_fkey" FOREIGN KEY (course_no) REFERENCES "Course"(course_no);


--
-- Name: PreRequisite_req_course_no_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "PreRequisite"
    ADD CONSTRAINT "PreRequisite_req_course_no_fkey" FOREIGN KEY (req_course_no) REFERENCES "Course"(course_no);


--
-- Name: Registration_course_offering_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Registration"
    ADD CONSTRAINT "Registration_course_offering_fkey" FOREIGN KEY (course_offering) REFERENCES "CourseOffering"(course_offering) ON DELETE CASCADE;


--
-- Name: Registration_grade_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Registration"
    ADD CONSTRAINT "Registration_grade_fkey" FOREIGN KEY (grade) REFERENCES "GradePoints"(grade_letter);


--
-- Name: Registration_roll_no_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Registration"
    ADD CONSTRAINT "Registration_roll_no_fkey" FOREIGN KEY (roll_no) REFERENCES "Student"(roll_no) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: TimeTable_course_offering_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "TimeTable"
    ADD CONSTRAINT "TimeTable_course_offering_fkey" FOREIGN KEY (course_offering) REFERENCES "CourseOffering"(course_offering) ON DELETE CASCADE;


--
-- Name: VisitingFaculty_faculty_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "VisitingFaculty"
    ADD CONSTRAINT "VisitingFaculty_faculty_id_fkey" FOREIGN KEY (faculty_id) REFERENCES "Faculty"(faculty_id);


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

