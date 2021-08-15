<?

class PhoneNormalizer implements NormalizerInterface, DenormalizerInterface
{
    /**
     * @inheritDoc
     */
    public function denormalize($data, $type, $format = null, array $context = [])
    {
        $phone = new Phone();
        $phone->id = $data['id'];
        $phone->type = $data['type'];
        $phone->number = $data['number'];

        return $phone;

    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === Phone::class;
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return [
            'id' => $object->id,
            'type' => $object->type,
            'number' => $object->number,
        ];
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Phone;
    }
}
