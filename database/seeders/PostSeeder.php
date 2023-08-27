<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->create([
            'title' => 'Richland Engineering kicks off Make A Difference Day food drive',
            'content' => 'MANSFIELD - Every year for the past 10 years employees at Richland Engineering Limited, 29 N. Park St., make a large donation of canned goods and nonperishable food items for the Make A Difference Day Food Drive, which is coming up this weekend. <br> <br>
            Monday, engineers and staff members carried out box after box of goodies to help restock five Richland County food pantries — Harmony House, Salvation Army, Domestic Violence Shelter, Volunteers of America and Catholic Charities HOPE Food Pantry. <br> <br>
            Dan Arnett backed a shiny red F-150 up to their downtown doorway and employees brought out Tide, oatmeal, frosting, ravioli, mac and cheese boxes, pasta, Stove Top Stuffing, tuna, bottles of ketchup and more. Plus, employees donated cash, which will be given to food pantries in the form of gift certificates to area grocery stores.',
            'author' => 3,
            'thumbnail_url' => '/images/dont-delete/seeder-data/posts/post1.jpg',
        ]);

        Post::factory()->create([
            'title' => "Making the Trans Canada Trail Safe and Accessible for People of All Abilities",
            'content' => "<p><span>Date: Saturday, September 16, 2023</span><br></p>
            <p>Time: 10:00 AM to 1:00 PM</p>
            <p>Location: Anytown, CA</p>
            <p>Join us for a community event to discuss ways to make the Trans Canada Trail safe and accessible for people of all abilities. We will hear from experts in accessibility and trail design, and we will have the opportunity to share our own ideas and experiences.</p>
            <p>This event is open to everyone who is interested in making the Trans Canada Trail more accessible. No prior experience is necessary.</p>  
            <p>What to bring:</p>
            <p>A willingness to participate and share ideas!</p>
            <p>A notebook and pen.</p>
            <p>Any materials you would like to use to illustrate your ideas.</p>
            <p>We hope to see you there!</p>",
            'author' => 2,
            'thumbnail_url' => '/images/dont-delete/seeder-data/events/event2.jpg',
            'type' => 'event',
        ]);


        Post::factory()->create([
            'title' => 'Chicago Jazz Festival',
            'content' => 'The longest-running of the citys lakefront music festivals, the Chicago Jazz Festival is also one of the most popular. Known for its artistic creativity, the Labor Day weekend festival promotes awareness and appreciation for all forms of jazz through free live musical performances at two stunning downtown venues: the Chicago Cultural Center and Millennium Park',
            'author' => 4,
            'thumbnail_url' => '/images/dont-delete/seeder-data/posts/post2.jpg',
        ]);

        Post::factory()->create([
            'title' => "Maggi and Concentri are excited to announce a new partnership!",
            'content' => "<p>We are joining forces to bring our customers the best possible experience. Together, we will offer a wider range of products and services, and we will be able to provide our customers with more personalized support.</p>
            <p>We are confident that this partnership will be mutually beneficial, and we look forward to working together to create a better future for our customers.</p>
            <p>Learn more about our partnership here: https://www.maggi.com</p>
            <p>Here are some additional tips for writing an announcement about a partnership or collaboration</p>",
            'author' => 1,
            'thumbnail_url' => '/images/dont-delete/seeder-data/announcements/img1.jpg',
            'type' => 'announcement',
        ]);

        Post::factory()->create([
            'title' => 'World Music Festival',
            'content' => 'The annual World Music Festival Chicago in late summer/early fall brings music from all over the globe to Chicago for this popular multi-day festival. The city-wide, multi-venue celebration features over 30 artists from 22 countries at venues around Chicago including the Chicago Cultural Center, Millennium Park, and Navy Pier.',
            'author' => 5,
            'thumbnail_url' => '/images/dont-delete/seeder-data/posts/post3.jpg',
        ]);

        Post::factory()->create([
            'title' => "Join us for a day of fun and activities at Cabuyao on August 20, 2023",
            'content' => "<p><span>We&apos;ll have games, music, prizes and give aways so there&apos;s something for everyone.</span><br></p> 
            <p>Food and drinks will be available for purchase, and there will be a cash prize for the best costume.</p>
            <p>Tickets are on sale now! Get yours today and don&apos;t miss out on the fun.</p>
            <p>https://www.vox.com</p>",
            'author' => 2,
            'thumbnail_url' => '/images/dont-delete/seeder-data/announcements/img2.jpg',
            'type' => 'announcement',
        ]);

        Post::factory()->create([
            'title' => 'Chilis',
            'content' => 'Chilis is home of sizzling fajitas and refreshing margaritas, and you wont believe these surprising facts about this beloved restaurant.',
            'author' => 6,
            'thumbnail_url' => '/images/dont-delete/seeder-data/posts/post4.jpg',
        ]);

        Post::factory()->create([
            'title' => 'Local artists begin work to create PNW-inspired mural at PDX',
            'content' => 'A partnership with the Portland Street Art Alliance is bringing a one-of-a-kind mural to the airport <br><br>
            Street art is coming to the Portland International Airport. Through a partnership with the Port of Portland and Portland Street Art Alliance, two local artists, Alex Chiu and Jeremy Nichols, are creating a mural in the north pedestrian tunnel at PDX that celebrates the people, history and natural wonders of the Pacific Northwest.<br><br>
            Port of Portland leaders believed it was important to showcase the diversity of the region and take a fresh approach to art in the terminal, especially in a space that many travelers pass through every day to access the parking garage. Thats why the Port of Portland partnered with PSAA to help breathe new life into the space. The goal was to create a magical and fantastic landscape, inspired by the culture and spirit of Portland and the Pacific Northwest.',
            'author' => 7,
            'thumbnail_url' => '/images/dont-delete/seeder-data/posts/post5.jpg',
        ]);

        Post::factory()->create([
            'title' => "Support Local Farmers and Businesses at the Farmer's Market!",
            'content' => "<p>Date: Saturday, August 27, 2023</p>
            <p>Time: 9:00 AM to 1:00 PM</p>
            <p>Location: Main Street Park, Anytown, CA</p>
            <p>Join us for our weekly farmer&apos;s market! This is a great opportunity to support local farmers and businesses, and to find fresh, seasonal produce. We will have a variety of vendors selling fruits, vegetables, meats, cheeses, baked goods, and more.</p>
            <p>We also have live music, face painting, and other activities for the whole family. So come out and enjoy a day of fun and support your community! </p>
            <p>People shopping at a farmer&apos;s marketOpens in a new window</p> 
            <p>www.morefood.org</p>
            <p>People shopping at a farmer&apos;s market</p>
            <p>What to bring:</p>
            <p>A reusable bag!</p>
            <p>Cash or credit card.</p>
            <p>Your appetite!</p>
            <p>We hope to see you there!</p>
            ",
            'author' => 1,
            'thumbnail_url' => '/images/dont-delete/seeder-data/events/event1.jpg',
            'type' => 'event',
        ]);



    }
}
