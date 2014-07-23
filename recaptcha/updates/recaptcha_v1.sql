
ALTER TABLE {pre}_access ADD access_captcha int(2) NOT NULL default '0';

INSERT INTO {pre}_options (options_mod, options_name, options_value) VALUES ('captcha','method','standard');
INSERT INTO {pre}_options (options_mod, options_name, options_value) VALUES ('captcha','private_key','');
INSERT INTO {pre}_options (options_mod, options_name, options_value) VALUES ('captcha','public_key','');
