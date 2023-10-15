/*
 Navicat Premium Data Transfer

 Source Server         : Local Postgre
 Source Server Type    : PostgreSQL
 Source Server Version : 150002
 Source Host           : localhost:5432
 Source Catalog        : tk-3
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 150002
 File Encoding         : 65001

 Date: 15/10/2023 12:28:42
*/


-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" "pg_catalog"."int8" NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" "pg_catalog"."varchar" COLLATE "pg_catalog"."default" NOT NULL,
  "email" "pg_catalog"."varchar" COLLATE "pg_catalog"."default" NOT NULL,
  "email_verified_at" "pg_catalog"."timestamp",
  "password" "pg_catalog"."varchar" COLLATE "pg_catalog"."default" NOT NULL,
  "remember_token" "pg_catalog"."varchar" COLLATE "pg_catalog"."default",
  "created_at" "pg_catalog"."timestamp",
  "updated_at" "pg_catalog"."timestamp",
  "role_id" "pg_catalog"."int8" NOT NULL
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (2, 'Nukman', 'nukman@gmail.com', '2023-10-15 00:36:57', '$2a$12$z8DSWp3IZ/bNfYrlA9M0kOj6AwSkM9wclgajz96Yob2x97nxQZhoa', NULL, NULL, NULL, 2);
INSERT INTO "public"."users" VALUES (3, 'Chika', 'chika@gmail.com', '2023-10-15 00:36:57', '$2a$12$z8DSWp3IZ/bNfYrlA9M0kOj6AwSkM9wclgajz96Yob2x97nxQZhoa', NULL, NULL, NULL, 2);
INSERT INTO "public"."users" VALUES (4, 'Putra', 'putra@gmail.com', '2023-10-15 00:36:57', '$2a$12$z8DSWp3IZ/bNfYrlA9M0kOj6AwSkM9wclgajz96Yob2x97nxQZhoa', NULL, NULL, NULL, 2);
INSERT INTO "public"."users" VALUES (5, 'Asa', 'asa@gmail.com', '2023-10-15 00:36:57', '$2a$12$z8DSWp3IZ/bNfYrlA9M0kOj6AwSkM9wclgajz96Yob2x97nxQZhoa', NULL, NULL, NULL, 2);
INSERT INTO "public"."users" VALUES (1, 'Admin', 'admin@gmail.com', '2023-10-15 00:36:57', '$2a$12$pr/AAogPJLDezZjHlvWxyuhfL2P/0TlliJARuh9lo7vRKS9oDgx/K', NULL, NULL, NULL, 1);

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "public"."roles" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
