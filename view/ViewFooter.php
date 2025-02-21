    
    <?php class ViewFooter{
 // Display footer using buffering
public function displayView():string {
    ob_start();
    ?>
        </main>
    <footer>
        <p>Ceci est le footer</p>
    </footer>
    </body>
    </html>
    <?php
    return ob_get_clean();
}
}
    
    
