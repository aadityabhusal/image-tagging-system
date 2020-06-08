--
-- Table structure for table `tags`
--
CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `tag_x` int(11) NOT NULL,
  `tag_y` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;
