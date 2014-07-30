@extends('_master')

@section('body')

	<h1>Chalkbox</h1>

	<h2>Manage your projects like a creative - not an accountant</h2>
	
	<h3>A starting point for crafting living style guides.</h3>
	
	<p>Address</p>
	<address>
	Company Name, Inc.<br>
	811 7th Ave, Suite 700<br>
	Manhattan, NY 10019<br>
	USA
  	</address>	

  	<p>Blockquote</p>
  	<blockquote>
	  	<p>Some sort of famous witty quote marked up with a &lt;blockquote> and a child &lt;p> element.</p>
	 </blockquote>

<blockquote>Even better philosophical quote marked up with just a &lt;blockquote> element.</blockquote>
  	
  	<p>Details</p>
  	<details open>
  <summary>More info</summary>
  <div>
    <p>Additional information</p>
    <ul>
      <li>Point 1</li>
      <li>Point 2</li>
    </ul>
  </div>
</details>
<details>
  <summary>More info</summary>
  <div>
    <p>Additional information</p>
    <ul>
      <li>Point 1</li>
      <li>Point 2</li>
    </ul>
  </div>
</details>
<details>
  <summary>More info</summary>
  <div>
    <p>Additional information</p>
    <ul>
      <li>Point 1</li>
      <li>Point 2</li>
    </ul>
  </div>
</details>
  	
  	<p>Figure</p>
  	<figure>
  <img src="http://placehold.it/240x240" alt="Image Alt Text">
  <figcaption>Figcaption content</figcaption>
</figure>

<figure>
  <img src="http://placehold.it/240x240" alt="Image Alt Text">
  <figcaption>
    <h4>Figure Title</h4>
    Figcaption content
  </figcaption>
</figure>


  	<p>Forms</p>
  	<form>
  <fieldset>
    <p><input type="button" value="Input type button"></p>
    <p><input type="reset" value="Input type reset"></p>
    <p><input type="submit" value="Input type submit"></p>
	<p><input class="action" type="submit" value="Action"></p>
    <p><input class="danger" type="submit" value="Danger"></p>
    <p><input type="submit" value="Input type submit disabled" disabled></p>
    <p><button type="button">Button type button</button></p>
    <p><button type="reset">Button type reset</button></p>
    <p><button type="submit">Button type submit</button></p>
    <p><button type="button" disabled>Button type button disabled</button></p>
    <p><button>Button</button></p>
  </fieldset>
</form>

  	<p>Form Fields</p>
  	<form>
  <fieldset>
    <div><label>Text input</label> <input type="text"></div>
    <div><label>Text input with placeholder</label> <input type="text" placeholder="I'm placeholder text"></div>
    <div><label>Readonly input</label> <input type="text" value="Read only text input" readonly></div>
    <div><label>Disabled input</label> <input type="text" value="Disabled text input" disabled></div>
    <div><label>Required input <span class="required">*</span></label> <input type="text" required></div>
    <div><label>Email input</label> <input type="email"></div>
    <div><label>Search input</label> <input type="search"></div>
    <div><label>Speech recognition input</label> <input type="text" id="speech" name="speech" x-webkit-speech=""></div>
    <div><label>Tel input</label> <input type="tel"></div>
    <div><label>Phone (International)</label> <input name="field_country_code" maxlength="3" /> - <input name="field_city_code" maxlength="4" /> - <input name="field_phone_int" maxlength="8" /></div>
    <div><label>URL input</label> <input type="url" placeholder="http://"></div>
    <div><label>Password input</label> <input type="password" value="password"></div>
    <div><label>Select field</label> <select><option>Option 01</option><option>Option 02</option></select></div>
    <div><label>Multiple select field</label><select multiple size="5"><option>Option 1</option><option>Option 2</option><option>Option 3</option><option>Option 4</option><option>Option 5</option><option>Option 6</option><option>Option 7</option><option>Option 8</option><option>Option 9</option><option>Option 10</option></select></div>
    <div><label>Radio input</label> <input type="radio" name="rad"></div>
    <div><label>Checkbox input</label> <input type="checkbox"></div>
    <div><label><input type="radio" name="rad"> Radio input</label></div>
    <div><label><input type="checkbox"> Checkbox input</label></div>
    <div><label>File input</label> <input type="file"></div>
    <div><label>Textarea</label> <textarea cols="30" rows="5" >Textarea text</textarea></div>
    <div><label>Color input</label> <input type="color" value="#000000"></div>
    <div><label>Number input</label> <input type="number" value="5" min="0" max="10"></div>
    <div><label>Range input</label> <input type="range" id="range" value="0" min="0" max="100"> <output for="range">0</output> 
    <script>
      if (document.querySelector) {
        document.querySelector('#range').onchange = function(e) {
          e.target.nextElementSibling.innerText = e.target.value;
        }
      }
    </script>
    </div>
    <div><label>Date input</label> <input type="date"></div>
    <div><label>Month input</label> <input type="month"></div>
    <div><label>Week input</label> <input type="week"></div>
    <div><label>Time input</label> <input type="time"></div>
    <div><label>Datetime input</label> <input type="datetime"></div>
    <div><label>Datetime-local input</label> <input type="datetime-local"></div>
  </fieldset>  
</form>
  	
  	<p>Form Fields</p>
  	<form>
  <fieldset>
    <div><label>Disabled text input</label> <input type="text" value="Disabled text input" disabled></div>
    <div><label>Disabled select field</label> <select disabled><option>Option 01</option><option>Option 02</option></select></div>
    <div><label>Disabled file input</label> <input type="file" disabled></div>
    <div><label>Disabled radio input</label> <input type="radio" name="rad" disabled></div>
    <div><label>Disabled checkbox input</label> <input type="checkbox" disabled></div>
    <div><label>Disabled color input</label> <input type="color" value="#000000" disabled></div>
    <div><label>Disabled range input</label> <input type="range" disabled></div>
    <div><label>Disabled number input</label> <input type="number" value="5" min="0" max="10" disabled></div>
    <div><label>Disabled textarea</label> <textarea cols="30" rows="5" disabled>Textarea text</textarea></div>
  </fieldset>
</form>


  	<p>Form Fields</p>
  	<form>
  <fieldset>
    <div><label>Readonly text input</label> <input type="text" value="Readonly text input" readonly></div>
    <div><label>Readonly color input</label> <input type="color" value="#000000" readonly></div>
    <div><label>Readonly range input</label> <input type="range" readonly></div>
    <div><label>Readonly number input</label> <input type="number" value="5" min="0" max="10" readonly></div>
    <div><label>Readonly textarea</label> <textarea cols="30" rows="5" readonly>Textarea text</textarea></div>
  </fieldset>  
</form>


  	<p>Form Fields with Details</p>
  	<form>
  <fieldset>
    <div>
      <label>Text input with datalist</label>
      <input type="text" value="" list="fav-color" placeholder="Type your favorite color" />
      <datalist id="fav-color">
        <option value="Red"></option> 
        <option value="Orange"></option> 
        <option value="Yellow"></option>
        <option value="Green"></option>
        <option value="Blue"></option>
        <option value="Purple"></option> 
      </datalist>
    </div>
    <div>
      <label>Range input with datalist</label>
      <input id="number_input" type="range" value="0" min="0" max="100" list="number" />
      <output for="number_input">0</output>
      <datalist id="number"> 
        <option>25</option> 
        <option>50</option> 
        <option>75</option> 
      </datalist>
      <script>
      if (document.querySelector) {
        document.querySelector('#number_input').onchange = function(e) {
          e.target.nextElementSibling.innerText = e.target.value;
        }
      }
    </script>
    </div>
    <div>
      <label>Color input with datalist</label>
      <input type="color" value="#000000" list="color" />
      <datalist id="color">
        <option>#ff0000</option> 
        <option>#0000ff</option> 
        <option>#00ff00</option> 
        <option>#ffff00</option> 
        <option>#00ffff</option> 
      </datalist>
    </div>
    <div>
      <label>Date input with datalist</label>
      <input type="date" list="days" />
      <datalist id="days">
        <option label="Independence Day">2013-07-04</option>
        <option label="Labor Day">2013-09-02</option>
        <option label="Columbus Day">2013-10-14</option>
      </datalist>
    </div>
    <div>
      <label>Time input with datalist</label>
      <input type="time" list="times" />
      <datalist id="times">
        <option label="Midnight">00:00</option>
        <option>06:00</option>
        <option label="Noon">12:00</option>
        <option>18:00</option>
      </datalist>
    </div>
    <div>
      <label>Datetime-local input with datalist</label>
      <input type="datetime-local" list="datetime-locals" />
      <datalist id="datetime-locals">
        <option label="Santa Visit">2012-12-24T23:59</option>
        <option label="Chrismas party">2012-12-25T18:00</option>
        <option>2012-12-30T00:00</option>
        <option label="Happy New Year">2013-01-01T00:00</option>
      </datalist>
    </div>
    <div>
      <label>Month input with datalist</label>
      <input type="month" list="months" />
      <datalist id="months">
        <option label="End of last century">2000-12</option>
        <option>2010-01</option>
        <option>2011-01</option>
        <option>2012-01</option>
        <option>2013-01</option>
      </datalist>
    </div>
    <div>
      <label>Week input with datalist</label>
      <input type="week" list="weeks" />
      <datalist id="weeks">
        <option label="First week of 2013">2013-W01</option>
        <option label="Second week of 2013">2013-W02</option>
        <option label="13th week of 2013">2013-W13</option>
        <option label="The last week of 2013">2013-W52</option>
      </datalist>
    </div>
  </fieldset> 
</form>

  	<p>Form Field with Fieldset</p>
  	
  	<form>
  <fieldset>
    <legend>Fieldset with legend</legend>
    <p><label>Text Input</label> <input type="text"></p>
    <p><input type="submit" value="Submit"></p>
  </fieldset>

  <fieldset>
    <p>Fieldset without legend</p>
    <p><label>Text Input</label> <input type="text"></p>
    <p><input type="submit" value="Submit"></p>
  </fieldset>

  <fieldset>
    <legend>Fieldset with a very, very, very, very, very, long legend that can test the display of word wrapping to see how it looks.</legend>
    <p><label>Text Input</label> <input type="text"></p>
    <p><input type="submit" value="Submit"></p>
  </fieldset>
</form>
  	
  	<p>Headings</p>
  	<h1>Heading 1 with <small>small text</small> and a <a href="#">link</a></h1>
<h2>Heading 2 with <small>small text</small> and a <a href="#">link</a></h2>
<h3>Heading 3 with <small>small text</small> and a <a href="#">link</a></h3>
<h4>Heading 4 with <small>small text</small> and a <a href="#">link</a></h4>
<h5>Heading 5 with <small>small text</small> and a <a href="#">link</a></h5>
<h6>Heading 6 with <small>small text</small> and a <a href="#">link</a></h6>

  	<p>Heading with Small</p>
  	<article>
  <h1>Heading 1 (in article) with <small>small text</small> and a <a href="#">link</a></h1>
  <h2>Heading 2 (in article) with <small>small text</small> and a <a href="#">link</a></h2>
  <h3>Heading 3 (in article) with <small>small text</small> and a <a href="#">link</a></h3>
  <h4>Heading 4 (in article) with <small>small text</small> and a <a href="#">link</a></h4>
  <h5>Heading 5 (in article) with <small>small text</small> and a <a href="#">link</a></h5>
  <h6>Heading 6 (in article) with <small>small text</small> and a <a href="#">link</a></h6>
</article>

  	<p>Heading with Small and h2</p>
  	<section>
  <h1>Heading 1 (in section) with <small>small text</small> and a <a href="#">link</a></h1>
  <h2>Heading 2 (in section) with <small>small text</small> and a <a href="#">link</a></h2>
  <h3>Heading 3 (in section) with <small>small text</small> and a <a href="#">link</a></h3>
  <h4>Heading 4 (in section) with <small>small text</small> and a <a href="#">link</a></h4>
  <h5>Heading 5 (in section) with <small>small text</small> and a <a href="#">link</a></h5>
  <h6>Heading 6 (in section) with <small>small text</small> and a <a href="#">link</a></h6>
</section>

  	<p>hr</p>
  	<hr>
  	
  	
  	<p>Definition List</p>
  	<dl>
  <dt>Description name</dt>
  <dd>Description value</dd>
  <dt>Description name</dt>
  <dd>Description value</dd>
  <dd>Description value</dd>
  <dt>Description name</dt>
  <dt>Description name</dt>
  <dd>Description value</dd>
</dl>
  	
  	<p>Ordered List</p>
  	<ol>
  <li>list item 1</li>
  <li>list item 1
    <ol>
      <li>list item 2</li>
      <li>list item 2
        <ol>
          <li>list item 3</li>
          <li>list item 3</li>
        </ol>
      </li>
      <li>list item 2</li>
      <li>list item 2</li>
    </ol>
  </li>
  <li>list item 1</li>
  <li>list item 1</li>
</ol>

  	<p>Unordered List</p>
  	<ul>
  <li>list item 1</li>
  <li>list item 1
    <ul>
      <li>list item 2</li>
      <li>list item 2
        <ul>
          <li>list item 3</li>
          <li>list item 3</li>
        </ul>
      </li>
      <li>list item 2</li>
      <li>list item 2</li>
    </ul>
  </li>
  <li>list item 1</li>
  <li>list item 1</li>
</ul>


  	<p>Media</p>
  	<h3>Default Image</h3>
<img src="http://placehold.it/240x240" alt="Dog">

<h3>Linked Image</h3>
<a href="#"><img src="http://placehold.it/240x240" alt="Dog"></a>

<h3>Missing Image</h3>
<img alt="This is an example of a missing image">


<h3>Svg</h3>
<svg width="200px" height="200px">
  <circle cx="100" cy="100" r="100" fill="#ff0000" />
</svg>


<h3>Video</h3>
<video controls preload poster="http://sandbox.thewikies.com/vfe-generator/images/big-buck-bunny_poster.jpg" width="640" height="360">
  <source id="mp4" src="http://media.w3.org/2010/05/bunny/trailer.mp4" type="video/mp4">
  <source id="ogv" src="http://media.w3.org/2010/05/bunny/trailer.ogv" type="video/ogg">
  <p>Your user agent does not support the HTML5 Video element.</p>
</video>

<h3>Missing Video</h3>
<video controls></video>


<h3>Audio</h3>
<audio controls>
  <source src="http://media.w3.org/2010/07/bunny/04-Death_Becomes_Fur.mp4" type='audio/mp4'>
  <source src="http://media.w3.org/2010/07/bunny/04-Death_Becomes_Fur.oga" type='audio/ogg; codecs=vorbis'>
  <p>Your user agent does not support the HTML5 Audio element.</p>
</audio>

<h3>Missing Audio</h3>
<audio controls></audio>


  	<p>Meter</p>
  <h3>Meter</h3>
<p><meter value="100" max="100" low="70" high="90">100%</meter> A meter displaying 100%.</p>
<p><meter value="85" max="100" low="70" high="90">85%</meter> A meter displaying 85%.</p>
<p><meter value="50" max="100" low="70" high="90">50%</meter> A meter displaying 50%.</p>
<p><meter value="0" max="100" low="70" high="90">0%</meter> A meter displaying 0%.</p>

<h3>Progress</h3>
<p><progress value="100" max="100">100%</progress> A progress displaying 100%.</p>
<p><progress value="85" max="100">85%</progress> A progress displaying 85%.</p>
<p><progress value="50" max="100">50%</progress> A progress displaying 50%.</p>
<p><progress value="0" max="100">0%</progress> A progress displaying 0%.</p>

	
  	<p>PRE and Code</p>
  	<pre>
P R E F O R M A T T E D T E X T
! " # $ % &amp; ' ( ) * + , - . /
0 1 2 3 4 5 6 7 8 9 : ; &lt; = &gt; ?
@ A B C D E F G H I J K L M N O
P Q R S T U V W X Y Z [ \ ] ^ _
` a b c d e f g h i j k l m n o
p q r s t u v w x y z { | } ~ 
</pre>

<h3>Pre Code</h3>
<pre><code>&lt;html>
  &lt;head>
  &lt;/head>
  &lt;body>
      &lt;div class="main"> &lt;div>
  &lt;/body>
&lt;/html></code></pre>
  	
  	
  	<p>Sample Content</p>
  	
  	<h1>Hello World</h1>

<p>Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<hr>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<ul>
  <li>In voluptate velit esse cillum</li>
  <li>In voluptate velit esse cillum</li>
  <li>In voluptate velit esse cillum</li>
</ul>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


  	<p>Table</p>
<table>
  <caption>Table Caption</caption>
  <thead>
    <tr>
      <th>thead th</th>
      <th>thead th</th>
      <th>thead th</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>tbody td</td>
      <td>tbody td</td>
      <td>tbody td</td>
    </tr>
    <tr>
      <td>tbody td</td>
      <td>tbody td</td>
      <td>tbody td</td>
    </tr>
    <tr>
      <td>tbody td</td>
      <td>tbody td</td>
      <td>tbody td</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th>tfoot th</th>
      <th>tfoot th</th>
      <th>tfoot th</th>
    </tr>
  </tfoot>
</table>



<h3>Table with side headings</h3>
<table>
  <caption>Table Caption</caption>
  <thead>
    <tr>
      <th>thead th</th>
      <th>thead th</th>
      <th>thead th</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>tbody th</th>
      <td>tbody td</td>
      <td>tbody td</td>
    </tr>
    <tr>
      <th>tbody th</th>
      <td>tbody td</td>
      <td>tbody td</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th>tfoot th</th>
      <td>tfoot td</td>
      <td>tfoot td</td>
    </tr>
  </tfoot>
</table>


  	<p>Text Elements</p>
  	<p>The <a href="#">a element</a> example</p>
<p>The <abbr>abbr element</abbr> and an <abbr title="Abbreviation">abbr</abbr> element with title examples</p>
<p>The <b>b element</b> example</p>
<p>The <cite>cite element</cite> example</p>
<p>The <code>code element</code> example</p>
<p>The <em>em element</em> example</p>
<p>The <del>del element</del> example</p>
<p>The <dfn>dfn element</dfn> and <dfn title="Title text">dfn element with title</dfn> examples</p>
<p>The <i>i element</i> example</p>
<p>The <ins>ins element</ins> example</p>
<p>The <kbd>kbd element</kbd> example</p>
<p>The <mark>mark element</mark> example</p>
<p>The <q>q element</q> example</p>
<p>The <q>q element <q>inside</q> a q element</q> example</p>
<p>The <s>s element</s> example</p>
<p>The <samp>samp element</samp> example</p>
<p>The <small>small element</small> example</p>
<p>The <span>span element</span> example</p>
<p>The <strong>strong element</strong> example</p>
<p>The <sub>sub element</sub> example</p>
<p>The <sup>sup element</sup> example</p>
<p>The <u>u element</u> example</p>
<p>The <var>var element</var> example</p>


  	<p>Time</p>
  	<p>Remember, remember the <time datetime="1605-11-05">5<sup>th</sup> of November</time></p>
  	
 
@stop 