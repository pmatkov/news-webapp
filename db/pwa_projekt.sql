-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 02:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwa_projekt`
--
CREATE DATABASE IF NOT EXISTS `pwa_projekt` DEFAULT CHARACTER SET cp1250 COLLATE cp1250_croatian_ci;
USE `pwa_projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `summary` text NOT NULL,
  `contents` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `category` varchar(64) NOT NULL,
  `archived` tinyint(1) NOT NULL,
  `article_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `summary`, `contents`, `image`, `category`, `archived`, `article_date`) VALUES
(2, 'Engineers invent vertical, full-color microscopic LEDs', 'Stacking light-emitting diodes instead of placing them side by side could enable fully immersive virtual reality displays and higher-resolution digital screens.', 'Take apart your laptop screen, and at its heart you\'ll find a plate patterned with pixels of red, green, and blue LEDs, arranged end to end like a meticulous Lite Brite display. When electrically powered, the LEDs together can produce every shade in the rainbow to generate full-color displays. Over the years, the size of individual pixels has shrunk, enabling many more of them to be packed into devices to produce sharper, higher-resolution digital displays.\r\n\r\nBut much like computer transistors, LEDs are reaching a limit to how small they can be while also performing effectively. This limit is especially noticeable in close-range displays such as augmented and virtual reality devices, where limited pixel density results in a “screen door effect” such that users perceive stripes in the space between pixels.\r\n\r\nNow, MIT engineers have developed a new way to make sharper, defect-free displays. Instead of replacing red, green, and blue light-emitting diodes side by side in a horizontal patchwork, the team has invented a way to stack the diodes to create vertical, multicolored pixels.\r\n\r\nEach stacked pixel can generate the full commercial range of colors and measures about 4 microns wide. The microscopic pixels, or “micro-LEDs,” can be packed to a density of 5,000 pixels per inch.\r\n\r\n“This is the smallest micro-LED pixel, and the highest pixel density reported in the journals,” says Jeehwan Kim, associate professor of mechanical engineering at MIT. “We show that vertical pixellation is the way to go for higher-resolution displays in a smaller footprint.”\r\n\r\n“For virtual reality, right now there is a limit to how real they can look,” adds Jiho Shin, a postdoc in Kim\'s research group. “With our vertical micro-LEDs, you could have a completely immersive experience and wouldn\'t be able to distinguish virtual from reality.”\r\n\r\nThe team\'s results are published today in the journal Nature. Kim and Shin\'s co-authors include members of Kim\'s lab, researchers around MIT, and collaborators from Georgia Tech Europe, Sejong University, and multiple universities in the U.S, France, and Korea.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'vertical-led.jpg', 'technology', 0, '2023-05-29 00:00:00'),
(3, 'A new method boosts wind farms\' energy output', 'By modeling the conditions of an entire wind farm rather than individual turbines, engineers can squeeze more power out of existing installations.\r\n', 'Virtually all wind turbines, which produce more than 5 percent of the world\'s electricity, are controlled as if they were individual, free-standing units. In fact, the vast majority are part of larger wind farm installations involving dozens or even hundreds of turbines, whose wakes can affect each other.\r\n\r\nNow, engineers at MIT and elsewhere have found that, with no need for any new investment in equipment, the energy output of such wind farm installations can be increased by modeling the wind flow of the entire collection of turbines and optimizing the control of individual units accordingly.\r\n\r\nThe increase in energy output from a given installation may seem modest — it\'s about 1.2 percent overall, and 3 percent for optimal wind speeds. But the algorithm can be deployed at any wind farm, and the number of wind farms is rapidly growing to meet accelerated climate goals. If that 1.2 percent energy increase were applied to all the world\'s existing wind farms, it would be the equivalent of adding more than 3,600 new wind turbines, or enough to power about 3 million homes, and a total gain to power producers of almost a billion dollars per year, the researchers say. And all of this for essentially no cost.\r\n\r\nThe research is published today in the journal Nature Energy, in a study led by MIT Esther and Harold E. Edgerton Assistant Professor of Civil and Environmental Engineering Michael F. Howland.\r\n\r\n“Essentially all existing utility-scale turbines are controlled \'greedily\' and independently,” says Howland. The term “greedily,” he explains, refers to the fact that they are controlled to maximize only their own power production, as if they were isolated units with no detrimental impact on neighboring turbines.\r\n\r\n\r\nBut in the real world, turbines are deliberately spaced close together in wind farms to achieve economic benefits related to land use (on- or offshore) and to infrastructure such as access roads and transmission lines. This proximity means that turbines are often strongly affected by the turbulent wakes produced by others that are upwind from them — a factor that individual turbine-control systems do not currently take into account.\r\n\r\n“From a flow-physics standpoint, putting wind turbines close together in wind farms is often the worst thing you could do,” Howland says. “The ideal approach to maximize total energy production would be to put them as far apart as possible,” but that would increase the associated costs.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'wind-farm.jpg', 'energy', 0, '2023-05-29 00:00:00'),
(4, 'A new concept for low-cost batteries', 'Made from inexpensive, abundant materials, an aluminum-sulfur battery could provide low-cost backup storage for renewable energy sources.\r\n', 'As the world builds out ever larger installations of wind and solar power systems, the need is growing fast for economical, large-scale backup systems to provide power when the sun is down and the air is calm. Today\'s lithium-ion batteries are still too expensive for most such applications, and other options such as pumped hydro require specific topography that\'s not always available.\r\n\r\nNow, researchers at MIT and elsewhere have developed a new kind of battery, made entirely from abundant and inexpensive materials, that could help to fill that gap. The new battery architecture, which uses aluminum and sulfur as its two electrode materials, with a molten salt electrolyte in between, is described today in the journal Nature, in a paper by MIT Professor Donald Sadoway, along with 15 others at MIT and in China, Canada, Kentucky, and Tennesse.\r\n\r\n“I wanted to invent something that was better, much better, than lithium-ion batteries for small-scale stationary storage, and ultimately for automotive [uses],” explains Sadoway, who is the John F. Elliott Professor Emeritus of Materials Chemistry.\r\n\r\nIn addition to being expensive, lithium-ion batteries contain a flammable electrolyte, making them less than ideal for transportation. So, Sadoway started studying the periodic table, looking for cheap, Earth-abundant metals that might be able to substitute for lithium. The commercially dominant metal, iron, doesn\'t have the right electrochemical properties for an efficient battery, he says. But the second-most-abundant metal in the marketplace — and actually the most abundant metal on Earth — is aluminum. “So, I said, well, let\'s just make that a bookend. It\'s gonna be aluminum,” he says.\r\n\r\nThen came deciding what to pair the aluminum with for the other electrode, and what kind of electrolyte to put in between to carry ions back and forth during charging and discharging. The cheapest of all the non-metals is sulfur, so that became the second electrode material. As for the electrolyte, “we were not going to use the volatile, flammable organic liquids” that have sometimes led to dangerous fires in cars and other applications of lithium-ion batteries, Sadoway says. They tried some polymers but ended up looking at a variety of molten salts that have relatively low melting points — close to the boiling point of water, as opposed to nearly 1,000 degrees Fahrenheit for many salts. “Once you get down to near body temperature, it becomes practical” to make batteries that don\'t require special insulation and anticorrosion measures, he says.\r\n\r\nThe three ingredients they ended up with are cheap and readily available — aluminum, no different from the foil at the supermarket; sulfur, which is often a waste product from processes such as petroleum refining; and widely available salts. “The ingredients are cheap, and the thing is safe — it cannot burn,” Sadoway says.\r\n\r\nIn their experiments, the team showed that the battery cells could endure hundreds of cycles at exceptionally high charging rates, with a projected cost per cell of about one-sixth that of comparable lithium-ion cells. They showed that the charging rate was highly dependent on the working temperature, with 110 degrees Celsius (230 degrees Fahrenheit) showing 25 times faster rates than 25 C (77 F).\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'low-cost-batteries.jpg', 'energy', 0, '2023-05-30 00:00:00'),
(5, 'Researchers develop water-free method to clean solar panels', 'A new cleaning method could remove dust on solar installations in water-limited regions, improving overall efficiency.\r\n', 'Solar power is expected to reach 10 percent of global power generation by the year 2030, and much of that is likely to be located in desert areas, where sunlight is abundant. But the accumulation of dust on solar panels or mirrors is already a significant issue — it can reduce the output of photovoltaic panels by as much as 30 percent in just one month — so regular cleaning is essential for such installations.\r\n\r\nBut cleaning solar panels currently is estimated to use about 10 billion gallons of water per year — enough to supply drinking water for up to 2 million people. Attempts at waterless cleaning are labor intensive and tend to cause irreversible scratching of the surfaces, which also reduces efficiency. Now, a team of researchers at MIT has devised a way of automatically cleaning solar panels, or the mirrors of solar thermal plants, in a waterless, no-contact system that could significantly reduce the dust problem, they say.\r\n\r\nThe new system uses electrostatic repulsion to cause dust particles to detach and virtually leap off the panel\'s surface, without the need for water or brushes. To activate the system, a simple electrode passes just above the solar panel\'s surface, imparting an electrical charge to the dust particles, which are then repelled by a charge applied to the panel itself. The system can be operated automatically using a simple electric motor and guide rails along the side of the panel. The research is described today in the journal Science Advances, in a paper by MIT graduate student Sreedath Panat and professor of mechanical engineering Kripa Varanasi.\r\n\r\nDespite concerted efforts worldwide to develop ever more efficient solar panels, Varanasi says, “a mundane problem like dust can actually put a serious dent in the whole thing.” Lab tests conducted by Panat and Varanasi showed that the dropoff of energy output from the panels happens steeply at the very beginning of the process of dust accumulation and can easily reach 30 percent reduction after just one month without cleaning. Even a 1 percent reduction in power, for a 150-megawatt solar installation, they calculated, could result in a $200,000 loss in annual revenue. The researchers say that globally, a 3 to 4 percent reduction in power output from solar plants would amount to a loss of between $3.3 billion and $5.5 billion.\r\n\r\n“There is so much work going on in solar materials,” Varanasi says. “They\'re pushing the boundaries, trying to gain a few percent here and there in improving the efficiency, and here you have something that can obliterate all of that right away.”\r\n\r\nMany of the largest solar power installations in the world, including ones in China, India, the U.A.E., and the U.S., are located in desert regions. The water used for cleaning these solar panels using pressurized water jets has to be trucked in from a distance, and it has to be very pure to avoid leaving behind deposits on the surfaces. Dry scrubbing is sometimes used but is less effective at cleaning the surfaces and can cause permanent scratching that also reduces light transmission.\r\n\r\n\r\nWater cleaning makes up about 10 percent of the operating costs of solar installations. The new system could potentially reduce these costs while improving the overall power output by allowing for more frequent automated cleanings, the researchers say.\r\n\r\n\r\n', 'solar-panels.jpg', 'energy', 0, '2023-05-30 00:00:00'),
(6, 'Insect-scale aerial robots emit light when they fly', 'Inspired by fireflies, researchers create insect-scale robots that can emit light when they fly, which enables motion tracking and communication.', 'Fireflies that light up dusky backyards on warm summer evenings use their luminescence for communication — to attract a mate, ward off predators, or lure prey.\r\n\r\nThese glimmering bugs also sparked the inspiration of scientists at MIT. Taking a cue from nature, they built electroluminescent soft artificial muscles for flying, insect-scale robots. The tiny artificial muscles that control the robots\' wings emit colored light during flight.\r\n\r\nThis electroluminescence could enable the robots to communicate with each other. If sent on a search-and-rescue mission into a collapsed building, for instance, a robot that finds survivors could use lights to signal others and call for help.\r\n\r\nThe ability to emit light also brings these microscale robots, which weigh barely more than a paper clip, one step closer to flying on their own outside the lab. These robots are so lightweight that they can\'t carry sensors, so researchers must track them using bulky infrared cameras that don\'t work well outdoors. Now, they\'ve shown that they can track the robots precisely using the light they emit and just three smartphone cameras.\r\n\r\n“If you think of large-scale robots, they can communicate using a lot of different tools — Bluetooth, wireless, all those sorts of things. But for a tiny, power-constrained robot, we are forced to think about new modes of communication. This is a major step toward flying these robots in outdoor environments where we don\'t have a well-tuned, state-of-the-art motion tracking system,” says Kevin Chen, who is the D. Reid Weedon, Jr. Assistant Professor in the Department of Electrical Engineering and Computer Science (EECS), the head of the Soft and Micro Robotics Laboratory in the Research Laboratory of Electronics (RLE), and the senior author of the paper.\r\n\r\nHe and his collaborators accomplished this by embedding miniscule electroluminescent particles into the artificial muscles. The process adds just 2.5 percent more weight without impacting the flight performance of the robot.\r\n\r\nThese researchers previously demonstrated a new fabrication technique to build soft actuators, or artificial muscles, that flap the wings of the robot. These durable actuators are made by alternating ultrathin layers of elastomer and carbon nanotube electrode in a stack and then rolling it into a squishy cylinder. When a voltage is applied to that cylinder, the electrodes squeeze the elastomer, and the mechanical strain flaps the wing.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'firefly-robot.jpg', 'technology', 0, '2023-05-30 00:00:00'),
(7, 'Coatings for shoe bottoms could improve traction on slick surfaces', 'Material inspired by Japanese paper-cutting art could help to prevent falls in icy or slippery conditions.\r\n', 'Inspired by the Japanese art of paper cutting, MIT engineers have designed a friction-boosting material that could be used to coat the bottom of your shoes, giving them a stronger grip on ice and other slippery surfaces.\r\n\r\nThe researchers drew on kirigami, a variation of origami that involves cutting paper as well as folding it, to create the new coating. Laboratory tests showed that when people wearing kirigami-coated shoes walked on an icy surface, they generated more friction than the uncoated shoes.\r\n\r\nIncorporating this coating into shoes could help prevent dangerous falls on ice and other hazardous surfaces, especially among the elderly, the researchers say.\r\n\r\n“Through this work we set out to address the challenge of preventing falls, particularly on icy, slippery surfaces, and developed a kirigami-based system that facilitates an increase of friction with a surface,” says Giovanni Traverso, an MIT assistant professor of mechanical engineering, a gastroenterologist at Brigham and Women\'s Hospital, and an assistant professor at Harvard Medical School.\r\n\r\nTraverso and Katia Bertoldi, a professor of applied mechanics at Harvard University, are the senior authors of the study, which appears today in Nature Biomedical Engineering. MIT Research Scientist Sahab Babaee is the lead author of the paper, along with Simo Pajovic, an MIT graduate student, and Ahmad Rafsanjani, a former postdoc at Harvard University.\r\n\r\nKirigami is an art form that involves cutting intricate patterns into sheets of paper and then folding them to create three-dimensional structures. Recently, some scientists have used this technique to develop new materials such as bandages that stick more securely to knees and other joints, and sensors that can be used to coat the skin of soft robots and help them orient themselves in space.\r\n\r\nIn this case, the team applied this approach to create intricate patterns of spikes in a sheet of plastic or metal. These sheets, applied to the sole of a shoe, remain flat while the wearer is standing, but the spikes pop out during the natural movement of walking.\r\n\r\n\r\n\r\n', 'shoe-grip.jpg', 'technology', 0, '2023-05-30 00:00:00'),
(17, 'With Perseverance, MIT teams prepare for Mars rover landing', 'Following touchdown, MOXIE will brew up oxygen while geologists comb for sediments to sample.', 'On Thursday, NASA’s newest Mars rover, Perseverance, is scheduled to touch down on the surface of the Red Planet following a nail-biting entry and descent sequence vividly known as the “seven minutes of terror.” If all goes according to plan, the car-sized explorer will blast safely down into Jezero Crater, a 28-mile-wide impact basin that once may have hosted a river delta flooded with water, and possibly life.  \r\n\r\nOver the next year and a half of its primary mission, Perseverance will explore the crater and collect rock samples that will one day be returned to Earth, where scientists hope to study them for evidence of ancient microbial life.\r\n\r\nAs the rover traverses the empty lake bed, it will determine which sediments to sample, with the help of MIT’s Tanja Bosak, professor of geobiology, and Benjamin Weiss, professor of planetary sciences. Bosak and Weiss are members of the mission’s return sample science team and will be using the rover’s images to direct the vehicle toward interesting sediments to collect.\r\n\r\nWhile Perseverance trundles across the crater, the MIT-designed Mars Oxygen In-Situ Resource Utilization Experiment, or MOXIE, installed in the belly of the rover, will be sucking in carbon dioxide-heavy Martian air and converting it into oxygen.\r\n\r\nMIT researchers, including MOXIE principal investigator Michael Hecht of MIT’s Haystack Observatory and PhD student Maya Nasr, will be monitoring and adjusting the instrument’s performance from Earth. If it works, MOXIE will demonstrate a viable path to producing oxygen and sustaining future human explorers on Mars.', 'mars-rover.jpg', 'space', 0, '2023-06-18 00:00:00'),
(18, '3Q: A bold mission to touch the sun', 'MIT’s John Belcher discusses the launch of the Parker Solar Probe, which will fly directly into the sun’s atmosphere.', 'On Sunday, NASA launched a bold mission to fly directly into the sun’s atmosphere, with a spacecraft named the Parker Solar Probe, after solar astrophysicist Eugene Parker. The incredibly resilient vessel, vaguely shaped like a lightbulb the size of a small car, was launched early in the morning from Cape Canaveral Air Force Station in Florida. Its trajectory will aim straight for the sun, where the probe will come closer to the solar surface than any other spacecraft in history.\r\n\r\nThe probe will orbit the blistering corona, withstanding unprecedented levels of radiation and heat, in order to beam back to Earth data on the sun’s activity. Scientists hope such data will illuminate the physics of stellar behavior. The data will also help to answer questions about how the sun’s winds, eruptions, and flares shape weather in space, and how that activity may affect life on Earth, along with astronauts and satellites in space.\r\n\r\nSeveral researchers from MIT are collaborating on the mission, including co-principal investigators John Belcher, the Class of 1992 Professor of Physics, and John Richardson, a principal research scientist in MIT’s Kavli Institute for Astrophysics and Space Research. MIT News spoke with Belcher about the historic mission and its roots at the Institute.\r\n\r\nIn order to survive, the spacecraft folds its solar panels into the shadows of its protective solar shade, leaving just enough of the specially angled panels in sunlight to provide power closer to the sun. To perform these unprecedented investigations, the spacecraft and instruments will be protected from the sun’s heat by a 4.5-inch-thick carbon-composite shield, which will need to withstand temperatures outside the spacecraft that reach nearly 2,500 degrees Fahrenheit.\r\n\r\nThe acceleration of the solar wind is still an outstanding question, mostly because all of the acceleration is over by [the time the wind has traveled] 25 solar radii. The Earth sits at 215 solar radii, so we have never made the most crucial observations close to the sun. It is only by getting this close to the sun that we have a chance of answering definitely what accelerates the wind. The major question is whether thermal processes or wave acceleration processes are most important, or both.  ', 'solar-probe.jpg', 'space', 0, '2023-06-18 00:00:00'),
(28, 'New black hole images reveal a glowing, fluffy ring and a high-speed jet', 'The observations will help astronomers pin down the physics of the plasma around black holes.', 'In 2017, astronomers captured the first image of a black hole by coordinating radio dishes around the world to act as a single, planet-sized telescope. The synchronized network, known collectively as the Event Horizon Telescope (EHT), focused in on M87*, the black hole at the center of the nearby Messier 87 galaxy. The telescope’s laser-focused resolution revealed a very thin glowing ring around a dark center, representing the first visual of a black hole’s shadow.\r\n\r\nAstronomers have now refocused their view to capture a new layer of M87*. The team, including scientists at MIT’s Haystack Observatory, has harnessed another global web of observatories — the Global Millimeter VLBI Array (GMVA) — to capture a more zoomed-out view of the black hole.\r\n\r\nThe new images, taken one year after the EHT’s initial observations, reveal a thicker, fluffier ring that is 50 percent larger than the ring that was first reported. This larger ring is a reflection of the telescope array’s resolution, which was tuned to pick up more of the super-hot, glowing plasma surrounding the black hole.\r\n\r\nFor the first time, scientists could see that part of the black hole’s ring consists of plasma from a surrounding accretion disk — a swirling pancake of white-hot electrons that the team estimates is being heated to billions of degrees Celsius as the plasma streams into the black hole at close to the speed of light.\r\n\r\nThe images also reveal plasma trailing out from the central ring, which scientists believe to be part of a relativistic jet blasting out from the black hole. The scientists tracked these emissions back toward the black hole and observed for the first time that the base of the jet appears to connect to the central ring.\r\n\r\n“This is the first image where we are able to pin down where the ring is, relative to the powerful jet escaping out of the central black hole,” says Kazunori Akiyama, a research scientist at MIT’s Haystack Observatory, who developed the imaging software used to visualize the black hole. “Now we can start to address questions such as how matter is captured by a black hole, and how it sometimes manages to escape.”\r\n\r\nTo capture images of M87*, astronomers used a technique in radio astronomy known as very-long-baseline interferometry, or VLBI. When a radio signal passes by Earth, such as from a black hole’s plasma emissions, radio dishes around the world can pick up the signal. Scientists can then determine the time at which each dish registers the signal, and the distance between dishes, and combine this information in a way that is analogous to the signal being seen by one very large, planet-scale telescope.', 'blackhole-jet.jpg', 'space', 0, '2023-06-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `password`, `level`) VALUES
(1, 'Thomas', 'Green', 'tom', '$2y$10$LwzZAB16qFqmXCdtbMGKce7P8lGj8yMVpCPYAm3Svxo6L6G18qeaq', 1),
(2, 'Steve', 'Jones', 'steve', '$2y$10$wt9yl87fghs98CXz2Kok5OdJhqnyXASOMeYFGd0osE0OAllM4HBgq', 0),
(10, 'Sonia', 'Green', 'sonia', '$2y$10$CMzJTMh70GotByJMaAoO4eYrscUv7lmsSP00scoLHcDOeBaKEU6Sq', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
