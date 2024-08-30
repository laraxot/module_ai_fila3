https://cubettech.com/resources/blog/building-ai-powered-web-applications-with-laravel/
https://laravel-news.com/openai-in-laravel

~~~php
use TensorFlow\Tensor;

use TensorFlow\Lite\Interpreter;

class ImageRecognitionModel

{

    protected $interpreter;

    public function __construct()

    {

        $this->interpreter = new Interpreter(__DIR__ . ‘/path/to/model.tflite’);

    }

    public function recognize(string $imagePath)

    {

        $inputTensor = $this->interpreter->getInputTensor(0);

        $inputTensor->resize([1, $inputTensor->shape()[1], $inputTensor->shape()[2], $inputTensor->shape()[3]]);

        $inputTensor->setFromFile($imagePath);

        $this->interpreter->invoke();

        $outputTensor = $this->interpreter->getOutputTensor(0);

        return $outputTensor->flat();

    }

}
~~~

------------


