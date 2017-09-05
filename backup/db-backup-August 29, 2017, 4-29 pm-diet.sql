

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("1","Lavern Sim","lavern","123");
INSERT INTO admin VALUES("2","Gera","gera","123");





CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO category VALUES("1","Inner Nutrition Programmes");
INSERT INTO category VALUES("2","Weight Management Products - Packs");
INSERT INTO category VALUES("3","");





CREATE TABLE `initial_result` (
  `ir_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `ir_date` date NOT NULL,
  `ir_fat` decimal(5,2) NOT NULL,
  `ir_visceral` decimal(5,2) NOT NULL,
  `ir_bonemass` decimal(5,2) NOT NULL,
  `ir_restingmr` decimal(5,2) NOT NULL,
  `ir_metabolic_age` decimal(5,2) NOT NULL,
  `ir_muscle_mass` decimal(5,2) NOT NULL,
  `ir_physique_rating` decimal(5,2) NOT NULL,
  `ir_water` decimal(5,2) NOT NULL,
  `ir_ideal_weight` decimal(5,2) NOT NULL,
  `ir_excess_fat` decimal(5,2) NOT NULL,
  `ir_ideal_visceral` decimal(5,2) NOT NULL,
  `ir_height` decimal(5,2) NOT NULL,
  `ir_weight` decimal(5,2) NOT NULL,
  `bmi` decimal(5,2) NOT NULL,
  `bfi` decimal(5,2) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  PRIMARY KEY (`ir_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO initial_result VALUES("1","1","2017-08-29","1.00","2.00","3.00","5.00","6.00","7.00","8.00","9.00","0.00","7.00","7.00","1.75","70.00","22.90","0.00","noral");
INSERT INTO initial_result VALUES("2","2","2017-08-29","5.00","6.00","7.00","8.00","9.00","0.00","8.00","6.00","5.00","4.00","4.00","1.75","70.00","22.86","0.00","normal");
INSERT INTO initial_result VALUES("3","3","2017-08-29","78.00","76.00","6.00","7.00","9.00","9.00","8.00","7.00","8.00","9.00","8.00","2.00","55.00","13.75","0.00","underweight");





CREATE TABLE `meal` (
  `meal_id` int(11) NOT NULL AUTO_INCREMENT,
  `meal_time` varchar(30) NOT NULL,
  `meal` text NOT NULL,
  `calories` varchar(15) NOT NULL,
  PRIMARY KEY (`meal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO meal VALUES("1","Breakfast11","Shake1","1501");
INSERT INTO meal VALUES("2","Lunch","2 Pcs Banana","200");





CREATE TABLE `monitoring` (
  `monitor_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `sponsor` varchar(30) NOT NULL,
  `program_id` int(11) NOT NULL,
  `target` varchar(50) NOT NULL,
  `monitor_status` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  PRIMARY KEY (`monitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO monitoring VALUES("1","1","","1","","Finished","2017-08-29");
INSERT INTO monitoring VALUES("2","1","","3","","Finished","2017-08-29");
INSERT INTO monitoring VALUES("3","1","","2","","","2017-08-29");





CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(30) NOT NULL,
  `vol_pts` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `sc` int(11) NOT NULL,
  `sb` int(11) NOT NULL,
  `supv` int(11) NOT NULL,
  `retail` int(11) NOT NULL,
  `profitc` int(11) NOT NULL,
  `profitsc` int(11) NOT NULL,
  `profitsb` int(11) NOT NULL,
  `profitsupv` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `reorder` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO product VALUES("1","Formula 1 Canister","18","10","20","30","40","1500","10","20","30","40","8","4","1");
INSERT INTO product VALUES("2","Formula 2","18","10","20","30","40","1500","10","20","30","40","20","1","1");





CREATE TABLE `program` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(30) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO program VALUES("1","Free Wellness");
INSERT INTO program VALUES("2","Weight Gain");
INSERT INTO program VALUES("3","Weight Loss");





CREATE TABLE `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO question VALUES("1","Do you feel sick or get sick often?");
INSERT INTO question VALUES("2","Do you easily get tired?");
INSERT INTO question VALUES("3","Do you suffer from chronic health problems such as headaches, backaches or constipation?");
INSERT INTO question VALUES("4","Do you feel your workplace-home-life stressful?");





CREATE TABLE `result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `monitor_id` int(11) NOT NULL,
  `weighin_date` date NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `fat` decimal(5,2) NOT NULL,
  `visceral` decimal(5,2) NOT NULL,
  `bone_mass` decimal(5,2) NOT NULL,
  `rmr` decimal(5,2) NOT NULL,
  `metabolic_age` decimal(5,2) NOT NULL,
  `muscle_mass` decimal(5,2) NOT NULL,
  `physique_rating` decimal(5,2) NOT NULL,
  `water` decimal(5,2) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO result VALUES("1","1","2017-08-29","6.00","7.00","8.00","9.00","0.00","6.00","7.00","6.00","6.00","j");





CREATE TABLE `schedule` (
  `sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `sched_event` varchar(200) NOT NULL,
  `sched_time` time NOT NULL,
  `sched_from` date NOT NULL,
  `sched_to` date NOT NULL,
  `sched_allday` varchar(5) NOT NULL,
  `sched_color` varchar(10) NOT NULL,
  PRIMARY KEY (`sched_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO schedule VALUES("1","Free Wellness","10:30:00","2017-08-29","2017-08-29","true","");
INSERT INTO schedule VALUES("2","Test","13:30:00","2017-08-30","2017-08-30","","");
INSERT INTO schedule VALUES("3","SeMinar","10:00:00","2017-08-31","2017-08-31","","");





CREATE TABLE `stockin` (
  `stockout_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `stockin_qty` int(11) NOT NULL,
  `stockin_date` datetime NOT NULL,
  PRIMARY KEY (`stockout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `stockout` (
  `stockout_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `stockout_qty` int(11) NOT NULL,
  `stockout_date` datetime NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`stockout_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO stockout VALUES("1","1","1","2017-08-25 14:11:25","1");
INSERT INTO stockout VALUES("2","1","1","2017-08-29 16:17:41","1");





CREATE TABLE `sup_taker` (
  `sup_taker` int(11) NOT NULL AUTO_INCREMENT,
  `monitor_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`sup_taker`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO sup_taker VALUES("1","1","1","9");
INSERT INTO sup_taker VALUES("2","1","2","9");
INSERT INTO sup_taker VALUES("3","2","1","10");
INSERT INTO sup_taker VALUES("4","2","2","10");
INSERT INTO sup_taker VALUES("5","3","1","10");
INSERT INTO sup_taker VALUES("6","3","2","10");





CREATE TABLE `supplement` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `sup_count` int(11) NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO supplement VALUES("1","1","10");
INSERT INTO supplement VALUES("2","2","10");





CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(30) NOT NULL,
  PRIMARY KEY (`survey_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO survey VALUES("1","1","2","yes");
INSERT INTO survey VALUES("2","2","2","yes");
INSERT INTO survey VALUES("3","2","4","yes");
INSERT INTO survey VALUES("4","3","4","yes");





CREATE TABLE `taker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last` varchar(15) NOT NULL,
  `first` varchar(15) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bday` date NOT NULL,
  `referrer_id` int(11) NOT NULL,
  `referrer_contact` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(8) NOT NULL,
  `points` decimal(7,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `orig_weight` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO taker VALUES("1","Cueva","Kaye","09898989","Female","1994-10-24","0","8989","","","Active","68.00","1.00","150.00","60.00");
INSERT INTO taker VALUES("2","njhj","jjj","8787","Male","2017-01-01","1","","","","Active","50.00","0.00","1.75","70.00");
INSERT INTO taker VALUES("3","lkl","kjk","6767","Male","2017-01-01","2","878","","","Active","0.00","0.00","2.00","55.00");





CREATE TABLE `taker_meal` (
  `taker_meal_id` int(11) NOT NULL AUTO_INCREMENT,
  `meal_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`taker_meal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO taker_meal VALUES("4","2","1");





CREATE TABLE `temp_trans` (
  `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `points` decimal(10,2) NOT NULL,
  PRIMARY KEY (`temp_trans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;




