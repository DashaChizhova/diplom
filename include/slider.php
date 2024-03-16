<?php 
        $sql = "SELECT * FROM project";
        $res = $mysqli -> query($sql);
    
        $slidesData = array();
        if($res -> num_rows > 0) {
            while($resArticle = $res -> fetch_assoc()) {
                $slidesData[] = $resArticle;
            }
        }
        ?>
        <script>
            const slidesData = <?php echo json_encode($slidesData); ?>; //json_encode - это функция в PHP, которая преобразует данные в формат JSON. 
            const slider = document.querySelector('.slider');
            const prevBtn = document.querySelector('.head__btn__left');
            const nextBtn = document.querySelector('.head__btn__right');
            let currentSlide = 1;
        
            function showSlide(index){
                const slide = slider.querySelector('.slide');
                const image = slider.querySelector('.project__img');
                const title = slide.querySelector('.project__title');
                const text = slide.querySelector('.project__price');
        
                image.src =  slidesData[index].image;
                title.textContent = slidesData[index].title;
                text.textContent = slidesData[index].text;
            }
        
            showSlide(currentSlide);
        
            prevBtn.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + slidesData.length) % slidesData.length;
                showSlide(currentSlide);
            });
            nextBtn.addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % slidesData.length;
                showSlide(currentSlide);
            });
        
        </script>