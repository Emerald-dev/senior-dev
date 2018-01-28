use rapids;

insert into users 
	(username, password, email, salt) 
	values
	('bab7607', '123', 'bab7607@rit.edu', 'nklv84sw5j'),
	('csn6973', '123', 'csn6973@rit.edu', 'd5g1jbp2sh'),
	('fxb5214', '123', 'fxb5214@rit.edu', 'v2ah852ded'),
	('jxb7623', '123', 'jxb7623@rit.edu', 'efp26qr2hj'),
	('pxc8399', '123', 'pxc8399@rit.edu', 'q28m2rl5f5'),
	('yxd1196', '123', 'yxd1196@rit.edu', 'iafhio6562');
	
insert into related_destination
	(name, lat, lon, link)
	values
	('Susan B. Anthony Museum & House', 43.15387, -77.628073, 'susanbanthonyhouse.org'),
	('Frederick Douglass National Historic Site', 38.863284, -76.985215, 'nps.gov'),
	('Mount Hope Cemetery', 43.128646, -77.620647, 'cityofrochester.gov');
	
insert into tombstones 
	(lat, lon, filter, image, name, summary, content)
	values
	(43.129519, -77.639381, 'The Revolutionary War, American Civil War, American Civil War', 'https://assets.entrepreneur.com/content/3x2/1300/20150406145944-dos-donts-taking-perfect-linkedin-profile-picture-selfie-mobile-camera-2.jpeg',
	'George Gordon', 'Gordon, George C., president of the First National Bank of Brockport, was born in Rushford, Allegany county, July 1, 1849, and his father, Luther Gordon, was a native of the same place. ', 'Gordon, George C., president of the First National Bank of Brockport, was born in Rushford, Allegany county, July 1, 1849, and his father, Luther Gordon, was a native of the same place. The grandfather, John, came from Cavendish, Vt., about 1809. In 1809 John G. visited the site of Rochester, but not liking it, settled in Rushford. Luther Gordon, the second son, formed a partnership with Samuel White in the furnace business, during which he invented the Genesee Plow. Disposing of the furnace business, he afterwards erected a large store at Rushford and engaged in general merchandise and the buying and shipping of stock. In 1856 he bought the lumber business of Boswell, Walker & Hood at Brockport, and in 1858 erected the family residence, to which he removed his family a year later. For some time he gave his attention to the lumber business, buying large tracts of western lands, mostly in Michigan. In 1863 he organized the first National, Bank of Brockport, and was elected president, which office he held to the time of his death, March 26, 1881. He married Florilla Cooley of Attica, Wyoming county, who died in 1869, leaving one son, George C. The latter was educated at Brockport College, and finished with a business course in Rochester. In 1874 he married Ida M., daughter of Thomas C. Hooker, and they have these children: Luther, George C., jr., William H., Frederick H., Thomas C., of whom William H. died in infancy. In 1881 our subject was elected president of the bank, which office he now fills, having begun his banking experience with Waters, Bishop & Co. In June, 1863, he was assaulted by thieves, thrown into the vault, and when aid reached him life was nearly extinct. Mr. Gordon is the leading business man of his town, and interested in all that tends to its advancement.'),
	(43.129483, -77.639393, 'The Revolutionary War, War of 1812', 'http://static2.businessinsider.com/image/5899ffcf6e09a897008b5c04-1200/.jpg',
	'Alonzo  Raymond', 'Raymond, Alonzo B., was born in Chenango county, July 18, 1819. His father, Alphius, was born in Massachusetts, and married a Miss Daniels. They first settled in McDonough, Chenango county, but in 1830 came to Monroe county and settled in the town of Byron, and later in Parma. ', 'Raymond, Alonzo B., was born in Chenango county, July 18, 1819. His father, Alphius, was born in Massachusetts, and married a Miss Daniels. They first settled in McDonough, Chenango county, but in 1830 came to Monroe county and settled in the town of Byron, and later in Parma. Alonzo B. was educated in the common schools and is pre-eminently a self-made man. At the age of nineteen he began teaching school, and continued for four years; was engaged in the mercantile business at North Parma, Spencerport, and Adams Basin for about twelve years, after which he confined himself to dealing in produce. In the spring of 1860 he was appointed pastor of the Universalist Church at Portage, Wyoming county, remaining in the ministry four years, after which he again engaged in the produce business and has so continued. In 1843 he married Elizabeth A., daughter of Samuel Wyman, and their children are A. Clayton, attorney at Detroit, Mich., counsel for the Grand Trunk and Canadian Pacific Railroad; and George H., of Buffalo. Our subject is one of the representative men of the town.'),
	(43.129485, -77.639337, 'The Revolutionary War', 'https://www.lawlogix.com/wp-content/uploads/2015/05/LW-603-p28-partner-profile.jpg',
	'Holmes Daniel', 'Holmes, Daniel, was born in West Bloomfield, September 11, 1828, a son of Daniel, sr., a native of Massachusetts, who, with his father, Alpheus, came to Ontario about 1811, among the pioneer settlers of that town. ', 'Holmes, Daniel, was born in West Bloomfield, September 11, 1828, a son of Daniel, sr., a native of Massachusetts, who, with his father, Alpheus, came to Ontario about 1811, among the pioneer settlers of that town. Daniel, sr., served in the war of 1812, and was at the burning of Buffalo by the British. He married Susan Stuart. Daniel, jr., was educated at Brockport Collegiate Institute in 1846, and was graduated from Yale College in 1848, after which he taught school in Woodford county; Ky., for two and a half years, spent a year in Canandaigua as professor of Latin, and then began the study of law. He was admitted to the bar in 1852, and married Mary J. Hawes of Brookfield, Mass., the well-known writer of fiction. Our subject has served in various positions of public trust and responsibility, and is regarded as one of the cultured and intelligent men of the town.'),
	(43.129440, -77.639277, 'War of 1812, American Civil War', 'https://www.fotkaplus.co.uk/wp-content/uploads/2016/04/carousel-profile-4.jpg',
	'Dorwain Richards', 'Richards, Dorwain, was born in Fulton county, N. Y., March 11, 1844, a son of Rev. William I. Richards, a native of Vermont, who came to Monroe county in 1860, and settled in the town of Clarkson, where he bought a farm, and remained to recover his health.', 'Richards, Dorwain, was born in Fulton county, N. Y., March 11, 1844, a son of Rev. William I. Richards, a native of Vermont, who came to Monroe county in 1860, and settled in the town of Clarkson, where he bought a farm, and remained to recover his health. In 1863 he resumed his labors in the ministry, which were continued up to the date of his death in 1875. Dorwain Richards was educated in the public schools, to which he has added by reading and close observation. In August, 1862, he enlisted in Co. A, 140th N. Y. Vols., and participated in the battles of Fredericksburg, Chancellorsville, Gettysburg, Mine Run, and the Wilderness, receiving an honorable discharge in 1865 at the close of the war, returning to the farm, where he remained till 1875. He then came to Brockport, and entered the employ of D. S. Morgan, remaining till 1888, then established his present business, carrying a, full line of fire, life, and accident insurance, and deals also in real estate. In 1868 he married Jane E. Moore, and their children are Mrs. Mabel B. Mitchell, and Jessie G. Richards.');

insert into general_content
	(page, dataType, content)
	values
	('Home', 'title', 'Rapids Cemetery'),
	('Home', 'subtitle', 'Rochester, New York'),
	('Home', 'text', 'This cemetery is located on the north side of Congress Avenue on the west side of the City of Rochester, N. Y.'),
	('Home', 'text', 'This cemetery was probably founded between 1810 and 1812. The property was originally owned by the Wadsworth family which owned land from Geneseo to Rochester. The Wadsworths set aside one and a quarter acre for a burial place of area residents. The cemetery resided in the Town of Gates until 1902 when the area was annexed into the City of Rochester. The road leading to the cemetery was originally called Cemetery Road. Then between 1880 and 1890 the name was changed to Chester Street. In 1899, Chester Street became Congress Avenue.'),
	('Home', 'text', 'On 20 September 1883 Herbert and William Wadsworth sold the cemetery lot to the newly formed "Rapids Cemetery Association." Monroe H. Oakley was the first president of the organization and Isaac Loomis was treasurer. The last known record of the Rapids Cemetery Association was in 1900 when they paid property taxes. The map, below, was traced from one probably made in the 1890s, although the exact date is unknown. It also included a list of plot owner, which relate to the map.'),
	('Home', 'text', 'Almost all the tombstones have been knocked over. The listing of tombstone inscriptions below was made from old transcriptions and a visit to the cemetery in the late 1980s.'),
	('Home', 'subtitle', 'Rochester\'s \'forgotten\' land: the Rapids Cemetery'),
	('Home', 'text', 'This is the story of a piece of land that nobody wanted, a little patch of green in the heart of Rochester\'s west side that may have tremendous significance in this Bicentennial year, but which is now little more than a refuse heap.'),
	('Home', 'text', 'It is called the "Rapids Cemetery." Located at 65 Congress Avenue, it is older than the City of Rochester itself. But those few people who know what and where it is are lost among the hundreds of cars, pedestrians, and neighborhood kids who pass it every day, totally unaware.'),
	('Home', 'text', 'To most, it is just a brief gap of sunlight in the middle of a shady westside block.'),
	('Flora', 'title', 'Flora'),
	('Flora', 'subtitle', 'Garlic'),
	('Flora', 'link', 'https://foodtoglow.files.wordpress.com/2015/03/img_20150316_175315.jpg'),
	('Flora', 'text', 'A number of different plant species of the genus Allium are known as wild garlic. Wild garlic is also a common name for plants in the genus Tulbag.'),
	('Flora', 'subtitle', 'Lilac'),
	('Flora', 'link', 'https://maxpull-tlu7l6lqiu.stackpathdns.com/wp-content/uploads/2017/06/zone-9-lilac.jpg'),
	('Flora', 'text', 'Lilacs have a deep rooted history originating in ancient Greek mythology. It was said that Pan, the god of forests and fields was hopelessly in love with a nymph named Syringa. One day he was pursuing her through a forest and, afraid of his advances, she turned herself into a lilac shrub to disguise herself.'),
	('Flora', 'subtitle', 'Lilium'),
	('Flora', 'link', 'https://i.pinimg.com/originals/05/41/12/054112201b64997b770cab1fdc371c48.jpg'),
	('Flora', 'text', 'Lilium (members of which are true lilies) is a genus of herbaceous flowering plants growing from bulbs, all with large prominent flowers. Lilies are a group of flowering plants which are important in culture and literature in much of the world. Most species are native to the temperate northern hemisphere, though their range extends into the northern subtropics. Many other plants have "lily" in their common name but are not related to true lilies.'),
	('History', 'title', 'Natural History'),
	('History', 'link', 'https://www.chamonix.net/sites/default/files/nodeimages/glacier0.jpg?itok=w3jQD5bT'),
	('History', 'subtitle', 'Glacier History'),
	('History', 'text', 'Primitive humans, clad in animal skins, trekking across vast expanses of ice in a desperate search to find food. That’s the image that comes to mind when most of us think about an ice age.'),
	('History', 'text', 'But in fact there have been many ice ages, most of them long before humans made their first appearance. And the familiar picture of an ice age is of a comparatively mild one: others were so severe that the entire Earth froze over, for tens or even hundreds of millions of years.'),
	('History', 'text', 'In fact, the planet seems to have three main settings: “greenhouse”, when tropical temperatures extend to the poles and there are no ice sheets at all; “icehouse”, when there is some permanent ice, although its extent varies greatly; and “snowball”, in which the planet’s entire surface is frozen over.'),
	('History', 'text', 'Why the ice periodically advances – and why it retreats again – is a mystery that glaciologists have only just started to unravel. Here’s our recap of all the back and forth they’re trying to explain.'),
	('Tombstone', 'title', 'Tombstones'),
	('Tombstone', 'text', 'There are many cemetery records. Most are lists of tombstone inscriptions but a few also include burial records. Not every cemetery is available and probably never will be as some are very large.'),
	('Tombstone', 'text', 'Some cemeteries have links to on-line maps from MapQuest and Google Maps which can be used to find the location of the cemetery and also to get directions to the cemetery. Included are GPS coordinates. If you need GPS coordinates in a different format, use this website to translate them to your format.'),
	('Destination', 'title', 'Related Destinations'),
	('Destination', 'text', 'There are maps of the Towns in Monroe County. There are also a few more maps listed on the links page.These are the maps that are here on the GenWeb of Monroe County. Besides these maps, there are many cemetery maps on the Cemetery Page and links to maps on other websites on the Links Page.'),
	('About', 'title', 'About Us'),
	('About', 'subtitle', 'About the USGenWeb Project'),
	('About', 'text', 'In March and April, 1996, a group of genealogists from Kentucky began organizing web pages for each county in their state. The idea caught on and soon other states began organizing similar pages. Almost every county in the US and Canada has a GenWeb page. Then the GenWeb project went world wide and there are similar pages for most countries on our planet. All GenWeb pages are staffed by volunteers helping people to find their families.');



