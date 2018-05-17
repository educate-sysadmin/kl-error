	-
-- Table structure for table `wp_kl_error`
--

CREATE TABLE `wp_kl_error` (
  `id` int(11) NOT NULL,
  `error` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `wp_kl_error`
--
ALTER TABLE `wp_kl_error`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_kl_error`
--
ALTER TABLE `wp_kl_error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;