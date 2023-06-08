<main class="home">
	<h2>Send an enquiry</h2>

	 <form id="addenquiry" action="/enquiry/add" method="POST">
        <label>First name</label>
	    <input type="text" name="enquiry[firstname]" value="<?=$enquiry->firstname ?? ''?>" />
        <label>Last name</label>
	    <input type="text" name="enquiry[lastname]" value="<?=$enquiry->lastname ?? ''?>" />
         <label>Email</label>
         <input type="text" name="enquiry[email]" value="<?=$enquiry->email ?? ''?>" />
         <label>Telephone number</label>
         <input type="text" name="enquiry[telephone]" value="<?=$enquiry->telephone ?? ''?>" />
         <label>Description</label>
        <textarea name="enquiry[description]" rows="80" cols="100" value="<?=$enquiry->description ?? ''?>"></textarea>
         <input type="submit" name="submit" value="Send" />  
     </form> 

	 
     
     
    
                 


</main>