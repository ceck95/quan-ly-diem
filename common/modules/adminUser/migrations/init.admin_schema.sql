CREATE TABLE adminuser.role (
  id SERIAL NOT NULL,
  name TEXT NOT NULL,
  status INT,
  created_at timestamp with time zone NOT NULL DEFAULT NOW(),
  updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
  created_by BIGINT,
  updated_by BIGINT,
  CONSTRAINT adminuser_role_pkey PRIMARY KEY (id)
);

CREATE TABLE adminuser.user (
  id SERIAL NOT NULL,
  role_id INT,
  email TEXT,
  username TEXT,
  avatar TEXT,
  auth_key TEXT,
  password_hash TEXT,
  password_reset_token TEXT,
  status INT,
  created_at timestamp with time zone NOT NULL DEFAULT NOW(),
  updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
  created_by BIGINT,
  updated_by BIGINT,
  CONSTRAINT adminuser_user_pkey PRIMARY KEY (id)
);

CREATE TABLE adminuser.role_right (
  id SERIAL NOT NULL,
  role_id INT,
  module TEXT,
  controller TEXT,
  action text,
  is_owner SMALLINT,
  status INT,
  created_at timestamp with time zone NOT NULL DEFAULT NOW(),
  updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
  created_by BIGINT,
  updated_by BIGINT,
  CONSTRAINT adminuser_role_right PRIMARY KEY (id)

)