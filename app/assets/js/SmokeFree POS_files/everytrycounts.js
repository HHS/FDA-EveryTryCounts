var quiz_questions_url = "http://smokefreegit.docksal/true-false-quiz-json-questions";
var quiz_nid = "810";

fallback.load({
    global_css: 'css/bootstrap.min.css',
    page_css: 'css/style.css',
    vue2_animate: 'css/vue2-animate-master/dist/vue2-animate.min.css',
    jQuery: [
        '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
        'js/jquery-3.2.1.min.js'
    ],
    'vue': [
        '//unpkg.com/vue@2.4.2',
        'js/vue.min.js'
    ],
    'axios': [
        '//unpkg.com/axios@0.16.2/dist/axios.min.js',
        'js/axios-master/dist/axios.min.js'
    ]
}, {
    shim: {
        'bootstrap': [
            'js/bootstrap.js'
        ],
    },
    callback: function(success, failed) {
        var vm = new Vue({
            el: "#app",
            data: {
                current_quiz_question_number: 1,
                total_quiz_questions: 7,
                all_quiz_questions: [],
                answer_selected: "",
                correct_answers: 0,
                show_quiz_part: "question",
                next_button_text: "next"
            },
            mounted: function () {
                axios.get(quiz_questions_url + '/' + quiz_nid)
                    .then(function (response) {
                        vm.all_quiz_questions = response.data.nodes;
                        vm.total_quiz_questions = vm.all_quiz_questions.length;
                        vm.current_quiz_question_number = 1;
                    });
            },
            methods: {
                record_answer: function(e) {
                    btn = e.target || e.srcElement;
                    this.answer_selected = btn.id;
                    if (this.answer_selected == this.all_quiz_questions[this.current_quiz_question_number - 1].node.field_correct_answer) {
                        this.correct_answers++;
                    }
                    this.show_quiz_part="feedback";
                },
                next_quiz_question: function () {
                    this.answer_selected = "";
                    if (this.current_quiz_question_number < this.total_quiz_questions) {
                        this.current_quiz_question_number++;
                        this.show_quiz_part="question";
                        this.next_button_text = this.current_quiz_question_number == this.total_quiz_questions ? "RESULTS" : "Next";
                    }
                    else {
                        this.show_quiz_part="results";
                    }

                },
                reset_quiz: function () {
                    this.answer_selected = "";
                    this.current_quiz_question_number = 1;
                    this.correct_answers = 0;
                    this.show_quiz_part="question";
                }
            },
        });
    }
});