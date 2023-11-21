<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aboutUs</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="flex">
        <?php include 'php-scripts/navbar.php'; ?>
    </div>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: "Playpen Sans", serif;
            /* margin: 20px;
            padding: 20px; */
            background-color: #FFFFFF;
            color: #3d3737;
        }

        .faq-container {
            max-width: 800px;
            margin: auto;
            margin-top: 3em;
            min-height: 70vh;
        }

        .faq-question {
            background-color: #FFAAC7;
            color: #fff;
            padding: 10px;
            cursor: pointer;
            border: none;
            text-align: left;
            width: 100%;
            font-size: 18px;
            transition: background-color 0.3s;
            font-family: "Playpen Sans", serif;
        }

        .faq-answer {
            font-family: "Playpen Sans", serif;
            display: none;
            padding: 10px;
            background-color: #FFFFFF;
            border: 1px solid #ddd;
        }

        .faq-question.active {
            background-color: #FE4D89;
        }
    </style>
</head>
<body>

<div class="faq-container">
    <h1>Frequently Asked Questions</h1>

    <div class="faq-item">
        <button class="faq-question">How Do I Adopt a Pet I See On KittyComeHome?</button>
        <div class="faq-answer">
            <p>Kitty Come Home is a website and searchable database for finding your furever cat. Our database boasts adoptable cats from all over the North America. To adopt a pet you see listed on Kitty Come Home, please click the “Adopt Form” button on the pet’s profile. You will then be given the cat’s fosteree contact information and, if an email is available for that foster, you will be able to email them using our form.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">How Do I Meet a Pet I See on KittyComeHome?</button>
        <div class="faq-answer">
            <p>Once you find a pet you’re interested in adopting, you’ll probably want to meet him or her. Go to the Pet Profile page by clicking on the pet’s picture or name on a search results page. This takes you to the pet’s detail page. Click “Adopt Form” to directly contact the foster to inquire further.</p>
        </div>
    </div>

    <!-- Add more FAQ items as needed -->

</div>
<footer></footer>
<script>
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            question.classList.toggle('active');
            const answer = question.nextElementSibling;
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        });
    });
</script>

</body>
</html>
