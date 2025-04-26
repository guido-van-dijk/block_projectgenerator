<?php
class block_projectgenerator extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_projectgenerator');
    }

    public function get_content() {
        global $OUTPUT, $PAGE;

        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();

        // HTML form for objectives input
        $form = '
        <form method="post">
            <label for="objectives"><strong>' . get_string('enterobjectives', 'block_projectgenerator') . '</strong></label><br>
            <textarea name="objectives" id="objectives" rows="4" cols="35" style="width:95%;"></textarea><br>
            <input type="submit" name="generate" value="' . get_string('generateproject', 'block_projectgenerator') . '" style="margin-top:6px;">
        </form>
        ';

        // Show result if form submitted
        $output = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['objectives'])) {
            // Clean input
            $objectives = clean_param($_POST['objectives'], PARAM_TEXT);

            // For now, generate a static example. (Later, call your AI/LLM API here!)
            $output = $this->generate_project($objectives);
        }

        $this->content->text = $form . $output;
        return $this->content;
    }

    // Placeholder: generate project outline from objectives (replace with API integration later)
    private function generate_project($objectives) {
        $result = "<div style='margin-top:1em;'><strong>Generated Project:</strong><br><br>
        <b>Objectives Entered:</b> <pre style='background:#f6f8fa;padding:6px;'>$objectives</pre>
        <b>Learning Task:</b> Design a real-world project using the entered objectives.<br>
        <b>Supportive Information:</b> Background resources and examples.<br>
        <b>Procedural Information:</b> Step-by-step guidance.<br>
        <b>Part-Task Practice:</b> Targeted skill exercises.<br>
        </div>";
        return $result;
    }
}