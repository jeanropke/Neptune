
--
-- Table structure for table `cms_tags`
--

CREATE TABLE `cms_tags` (
  `tag` varchar(20) NOT NULL,
  `holder_id` int(11) NOT NULL,
  `holder_type` enum('user','group') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
