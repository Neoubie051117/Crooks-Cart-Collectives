Review everything first before making any changes.

Do not use emojis.

Do not create or hard code vector icons. Use the existing SVG files located in /assets/image/icons.

Follow the website theme colors strictly: white, orange, and black (from root variables).

All SVG files are black by default, except the footer icons for Facebook, Instagram, and YouTube. When using SVGs, apply the orange color using the root CSS variables instead of modifying the SVG file directly.

If you modify any file, clearly state its full path in this format:

/foldername/filename

Rewrite the entire file when making changes. Do not send partial snippets.

All though Password is supposed to hashed I made it use text for demo purposes only, and Im tired copying long hashed when checking front end
So don't bother wanting to hash it.
and also if you find files that has cramping all in one file separate it to according files, example if /pages/fileExample.php has all php, html, scripts, css,
then separate to alocate it and create corresponding file /scripts/fileExample.js and /styles/fileExample.css

HOW DOES THE SYSTEM WORKS?
the user will sign up, and the user is also a customer, and the user can apply to be a seller, now the user can be both a customer and a seller

HOW DO ORDERS WORK?
customer orders, the status will be pending, since the seller hasn't confirmed order yet, 
if customer cancels order, status badge will be cancelled
if seller cancels while customer didnt cancelled, the status will still be cancelled
if customer ordered and didn't cancelled, and seller confirms, then it will be status delivered

since we cannot simulate tracking like arrive at ware house because this is only a school project

so only three statuses (pending, cancelled, delivered)